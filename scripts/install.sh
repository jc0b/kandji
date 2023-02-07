#!/bin/bash

# Kandji controller
CTL="${BASEURL}index.php?/module/kandji/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/kandji.py" -o "${MUNKIPATH}preflight.d/kandji.py"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/kandji.py"

	# Set preference to include this file in the preflight check
	setreportpref "kandji" "${CACHEPATH}kandji.plist"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/kandji.py"

	# Signal that we had an error
	ERR=1
fi

# delete old Kandji module things
rm -f "${CACHEPATH}kandji.txt"
rm -f "${MUNKIPATH}preflight.d/kandji"
rm -f "${MUNKIPATH}scripts/kandji"
rm -f "${MUNKIPATH}postflight.d/kandji"
