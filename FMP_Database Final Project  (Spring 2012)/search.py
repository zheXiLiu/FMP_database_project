#!/shanzou2/bin/python2

import getopt
import re
import sys

def main(argv):
    opts, filenames = getopt.getopt(argv[1:], 'v')
    verbose = False
    for o, a in opts:
        if o == '-v':
            verbose = True

    index = {}
    for filename in filenames:
        with open(filename, 'r') as f:
            for line in f:
                # read line into index
                token, rest = line.split('\t', 1)
                try:
                    # the rest of the line is either a tuple of filenames or a
                    # dict from filenames to popularity
                    search_results = eval(rest)
                except Exception, e:
                    print 'eval error'
                    raise
                index[token] = search_results
    # if the secondary structure is a dict then we allow multiterm search
    allow_multiterm = False
    if len(index):
        allow_multiterm = isinstance(index.itervalues().next(), dict)

    while True:
        # take input until EOF
        try:
            search_term = raw_input('Search term = ')
        except EOFError:
            print # output newline
            break
        # convert to lowercase
        search_term = search_term.lower()
        # if we allow multiple terms then break the input on whitespace
        if allow_multiterm:
            search_terms = search_term.split()
        else:
            search_terms = [search_term]
        # get the result from the index
        results = [index[term] for term in search_terms if term in index]
        # if some term had no results then there are no global results
        if len(results) < len(search_terms):
            print 'No results.'
            continue
        # in the simple case there is only 1 result and it is already a iterable
        # of filenames
        if not allow_multiterm:
            assert len(results) == 1
            final_results = results[0]
        else:
            # copy the first results
            cresults = results[0].copy()
            # for each filename in the first results
            for key in cresults:
                # multiply the popularity of the first term in that file with
                # the popularity of the other terms
                for result in results[1:]:
                    cresults[key] *= result.get(key, 0)
            # filter out any 0 popularity results, this means one of the search
            # terms wasn't in that file
            fresults = filter(lambda (k,v): v != 0, cresults.iteritems())
            def compare((k1,v1), (k2,v2)):
                if v2 < v1:
                    return -1
                if v2 > v1:
                    return 1
                if k1 < k2:
                    return -1
                if k1 > k2:
                    return 1
                return 0
            # sort results the same way as in the MapReduce
            sresults = sorted(fresults, cmp=compare)
            # get the filenames in order
            if verbose:
                final_results = ['%s (Adjusted pop: %d)' % sresult for
                    sresult in sresults]
            else:
                final_results = [sresult[0] for sresult in sresults]
            # if no filenames exist then the combination of terms had no result
            if not final_results:
                print 'No results.'
                continue
        # print numbered list of results
        print 'Results:'
        for i, result in enumerate(final_results[:10], start=1):
            print '%d) %s' % (i, result)
            

if __name__ == '__main__':
    main(sys.argv)
