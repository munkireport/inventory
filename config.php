<?php

return [
/*
|===============================================
| Inventory - bundle ignore list
|===============================================
|
| List of bundle-id's to be ignored when processing inventory
| The list is processed using regex, examples:
|
| Skip  all virtual windows apps created by parallels and VMware
| $conf['bundleid_ignorelist'][] = ['com.parallels.winapp.*', 'com.vmware.proxyApp.*'];
|
| Skip all Apple apps, except iLife, iWork and Server
| 'com.apple.(?!iPhoto)(?!iWork)(?!Aperture)(?!iDVD)(?!garageband)(?!iMovieApp)(?!Server).*'
|
| Skip all apps with empty bundle-id's
| '^$'
|
*/
'bundleid_ignorelist' => env('BUNDLEID_IGNORELIST', [
      'com.parallels.winapp.*',
      'com.vmware.proxyApp.*',
      'com.apple.print.PrinterProxy',
      'com.google.Chrome.app.*',
    ]),

/*
|===============================================
| Inventory - path ignore list
|===============================================
|
| List of bundle-paths to be ignored when processing inventory
| The list is processed using regex, examples:
|
| Skip all apps in /System/Library
| $conf['bundlepath_ignorelist'][] = '/System/Library/.*';
|
| Skip all apps that are contained in an app bundle
| $conf['bundlepath_ignorelist'][] = '.*\.app\/.*\.app';
|
*/
'bundlepath_ignorelist' => env('BUNDLEPATH_IGNORELIST', [
      '/System/Library/.*',
      '.*/Library/AutoPkg.*',
      '/.DocumentRevisions-V100/.*',
      '/Library/Application Support/Adobe/Uninstall/.*',
      '.*/Library/Application Support/Google/Chrome/Default/Web Applications/.*',
    ]),

];
