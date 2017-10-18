# CMB-for-Axeos-PBX
This plugin enables you to easily add call-me-back functionality to your <a href="https://wordpress.org">WordPress</a> website utilizing the API of your <a href="https://axeos.com">Axeos cloud PBX</a>.

##  Requirements
WP 4.8.2. It may work on earlier versions but I have simply not tested those.

## Download
Zip-file to upload to your WordPress site: <a href="https://github.com/olku/CMB-for-Axeos-PBX/archive/master.zip">download here</a>.

## PBX documentation
PBX documentation on call-me-back: <a href="https://axeos.com/knowledgebase/call-back-cmb/">Axeos knowledgebase</a>.

## Installation
1. Log into your WordPress site with an admin account. 
2. Go to 'Plugins' and click 'Add New'. 
3. Then click 'Upload Plugin'. Choose the file 'CMB-for-Axeos-PBX-master.zip' which you downloaded from the 'Download' step in this readme file.
4. Activate the plugin.

## Configuration in WordPress administration
After installation and activation of this plugin you'll have a new menu item in the left menu column of your WordPress admin: 'CMB Settings'. It provides you with a settings page to configure:
* PBX API key
* PBX IP (or hostname)
* CMB context

## Caveats
Make sure you have allowed the IP-address of your webserver in the firewall of your PBX, or the requests to the PBX will fail.

## License
I have released this plugin under the GNU GENERAL PUBLIC LICENSE Version 3. In short this means you may copy, distribute and modify this software as long as you track changes/dates in source files and retain the original copyright. Any modifications you make must also be made available under the GPL along with build & install instructions. For more detailed information view the license file included in this repository.

## Disclaimer
This plugin is not an official Axeos product. It's not released by Axeos. It's not supported by Axeos.

## Issues
If you encounter an issue which is related to the code (I won't solve your hosting environment issues) you can <a href="https://github.com/olku/CMB-for-Axeos-PBX/issues/new">open an issue</a> or fix it yourself.