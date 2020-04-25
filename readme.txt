The extension is a skin that generates reports as JSON in a structure suitable for Google's Charts library.

To install the library, download the zip and run
sudo wee_extension --install json-skin-0.1.zip

If you do not have sufficient privileges, you will get an error about a "file not found".

If successful, the installer will give the following output:
Request to install 'json-skin-0.1.zip'
Extracting from zip archive json-skin-0.1.zip
Saving installer file to /usr/share/weewx/user/installer/json
Saved configuration dictionary. Backup copy at /etc/weewx/weewx.conf.20200322132010
Finished installing extension 'json-skin-0.1.zip'

You can check that the skin has installed correctly by listing all extensions:
wee_extension --list
Extension Name    Version   Description
json-skin         0.1       Skin that produces reports in JSON suitable for consumption 
using Google Charts.

By default, the path to the Json data files is assumed to be in the same folder 
as the HTML and Javascript files. If you have a more complex setup, you can 
configure the path to the content files by changing the content_path in the 
Extras section of  skin.conf:


[[Json]]
   # The default configuration is that the content path to the JSON files
   # is the same as the location of the index.html page.
   content_path = '.'
   is_file_loader = 'false'

   # if you need to load the JSON files from a different server to the web page,
   # you can use the file_loader.php script to load the files and set the
   # Access-Control-Allow-Origin header to *.
   # You will need to manually copy the file_loader php script to a suitable
   # location and enable PHP7 on your webserver.

   #content_path = '/scripts/file_loader.php'
   #is_file_loader = 'true'

You will need to restart weewx after installing the extension
sudo systemctl restart weewx

and then check the status

udo systemctl status weewxq

The index.html file and associated update-archive-weather.js give an example.

Note that the units in json/skin.conf do not get picked up. You'll need to set 
the units you require in the defaults section of /etc/weewx/weewx.conf.

