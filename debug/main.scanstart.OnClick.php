<?php global $count, $vFile;
switch ( c("scanType")->itemIndex ){
    case 0:
        if ( c("openDlg")->execute() ){
            c("scanCount")->caption = "Просканировано файлов : 0";
            $file = c("openDlg")->fileName;
            c("scanFile")->caption = "Текущий файл $file";
            $hash = md5( join ( file ( $file ) ) );
            if ( file_exists("$progDir/data/$hash") ){
                $vFile = $file;
                $vType = file_get_contents("$progDir/data/$hash");
                c("dialog")->title = "Обнаружен вирус!
Файл : $vFile
Заражен вирусом : $vType";
                c("dialog")->execute();
            }
            c("scanCount")->caption = "Просканировано файлов : 1";
        }
    break;
    case 1:
        if ( c("dirDlg")->execute() ){
            c("scanCount")->caption = "Просканировано файлов : 0";
            $count = 0;
            $dir = c("dirDlg")->fileName;
            $files = "$dir\*.*";
            foreach ( glob($files ) as $scan ){
            $hash = md5( join ( file ( $scan ) ) );
            c("scanFile")->caption = "Текущий файл $scan";
            if ( file_exists("$progDir/data/$hash") ){
                $vFile = $scan;
                $vType = file_get_contents("$progDir/data/$hash");
                c("dialog")->title = "Обнаружен вирус!
Файл : $vFile
Заражен вирусом : $vType";
                c("dialog")->execute();
            }
            $count++;
            c("scanCount")->caption = "Просканировано файлов : $count";
            }
        }
    break;
}
