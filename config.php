<?php

return [
  'bundleid_ignorelist' => env('BUNDLEID_IGNORELIST', [
        'com.parallels.winapp.*',
        'com.vmware.proxyApp.*',
        'com.apple.print.PrinterProxy',
        'com.google.Chrome.app.*',
  ]),
  'bundlepath_ignorelist' => env('BUNDLEPATH_IGNORELIST', [
        '/System/Library/.*',
        '.*/Library/AutoPkg.*',
        '/.DocumentRevisions-V100/.*',
        '/Library/Application Support/Adobe/Uninstall/.*',
        '.*/Library/Application Support/Google/Chrome/Default/Web Applications/.*',
  ]),
'apps_to_track' => env('APPS_TO_TRACK', ['Safari']),
];
