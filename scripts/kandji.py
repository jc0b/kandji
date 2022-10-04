#!/usr/local/munkireport/munkireport-python2

import subprocess, re
import os
import sys
import json
import time

sys.path.insert(0, '/usr/local/munki')
sys.path.insert(0, '/usr/local/munkireport')

from munkilib import FoundationPlist
from Foundation import CFPreferencesCopyAppValue

def get_local_kandji_prefs():
    result = dict()
    result['kandji_agent_version'] = CFPreferencesCopyAppValue('AgentVersion', 'io.kandji.Kandji')
    result['blueprint_name'] = CFPreferencesCopyAppValue('Blueprint', 'io.kandji.Kandji')
    result['kandji_id'] = CFPreferencesCopyAppValue('ComputerURL', 'io.kandji.Kandji').split('/')[-1]
    return result

def kandji_report_enabled():
    return CFPreferencesCopyAppValue('KandjiCheck', 'MunkiReport')

def main():
    """Main"""

    # Set the encoding
    reload(sys)
    sys.setdefaultencoding('utf8')

    # Get results
    if kandji_report_enabled():
        result = get_local_kandji_prefs()
    else:
        result = dict()

    # Write results to cache
    cachedir = '%s/cache' % os.path.dirname(os.path.realpath(__file__))
    output_plist = os.path.join(cachedir, 'kandji.plist')
    FoundationPlist.writePlist(result, output_plist)

if __name__ == "__main__":
    main()