#!/bin/bash

# Kandji controller
CTL="${BASEURL}index.php?/module/kandji/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/kandji" -o "${MUNKIPATH}preflight.d/kandji"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/kandji"

	# Set preference to include this file in the preflight check
	setreportpref "kandji" "${CACHEPATH}kandji.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/kandji"

	# Signal that we had an error
	ERR=1
fi


