#!/usr/local/munkireport/munkireport-python3

import subprocess
import os
import sys
import plistlib

sys.path.insert(0, '/usr/local/munki')
sys.path.insert(0, '/usr/local/munkireport')

from Foundation import CFPreferencesCopyAppValue

def get_local_kandji_prefs():
    result = dict()
    result['kandji_agent_version'] = CFPreferencesCopyAppValue('AgentVersion', 'io.kandji.Kandji')
    result['blueprint_name'] = CFPreferencesCopyAppValue('Blueprint', 'io.kandji.Kandji')
    result['device_id'] = CFPreferencesCopyAppValue('ComputerURL', 'io.kandji.Kandji')
    if result['device_id'] is not None:
        result['device_id'] = result['device_id'].split('/')[-1]
    return result

def get_users_info():
    # Get all users info as plist
    cmd = ['/usr/bin/dscl', '-plist', '.', '-readall', '/Users']
    proc = subprocess.Popen(cmd, shell=False, bufsize=-1,
                            stdin=subprocess.PIPE,
                            stdout=subprocess.PIPE, 
                            stderr=subprocess.PIPE)
    (output, unused_error) = proc.communicate()
    

        # Fix #1: use plistlib.loads() — readPlistFromString removed in Python 3.9+
    try:
        return plistlib.loads(output)
    except Exception:
        return {}

def get_passport_info():
    out = []
    all_users = get_users_info()
    for user in all_users:
        if 'dsAttrTypeNative:io.kandji.KandjiLogin.LinkedAccount' in list(user.keys()):
            kandji_linked_account = user['dsAttrTypeNative:io.kandji.KandjiLogin.LinkedAccount'][0]
            user_shortname = user['dsAttrTypeStandard:RecordName'][0]
            out.append('%s: %s' % (user_shortname, kandji_linked_account))
    if len(out) > 0:
        return ', '.join(out)
    return []

def main():
    """Main"""

    if not os.path.isfile('/usr/local/bin/kandji'):
        print("ERROR: The Kandji agent is not installed")
        exit(0)

    # Get results
    result = get_local_kandji_prefs()
    passport_users = get_passport_info()
    if len(passport_users) > 0:
        result['passport_enabled'] = "True"
        result['passport_users'] = passport_users
        
    # Fix #2: use plistlib.dump() — writePlist removed in Python 3.9+
    # Write results to cache
cachedir = '%s/cache' % os.path.dirname(os.path.realpath(__file__))
    output_plist = os.path.join(cachedir, 'kandji.plist')
    with open(output_plist, 'wb') as fp:
        plistlib.dump(result, fp, fmt=plistlib.FMT_XML)

if __name__ == "__main__":
    main()
