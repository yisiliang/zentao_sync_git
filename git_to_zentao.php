<?php
        $repoRoot = getcwd();
        $fromRevision = $argv[1];
        $endRevision = $argv[2];
        $branch = $argv[4];
        $fileName = "/repo/tmp/".str_replace("/", "_", $repoRoot).$fromRevision.$endRevision.".log";
        $fileContents = "repoRoot=".$repoRoot."\nfromRevision=".$fromRevision."\nendRevision=".$endRevision."\nbranch=".$branch."\n";
        file_put_contents($fileName, $fileContents);

        `scp $fileName root@192.168.1.160:/opt/zbox/app/zentao/tmp/git/`;

