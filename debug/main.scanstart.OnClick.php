<?php global $count, $vFile;
switch ( c("scanType")->itemIndex ){
    case 0:
        if ( c("openDlg")->execute() ){
            c("scanCount")->caption = "�������������� ������ : 0";
            $file = c("openDlg")->fileName;
            c("scanFile")->caption = "������� ���� $file";
            $hash = md5( join ( file ( $file ) ) );
            if ( file_exists("$progDir/data/$hash") ){
                $vFile = $file;
                $vType = file_get_contents("$progDir/data/$hash");
                c("dialog")->title = "��������� �����!
���� : $vFile
������� ������� : $vType";
                c("dialog")->execute();
            }
            c("scanCount")->caption = "�������������� ������ : 1";
        }
    break;
    case 1:
        if ( c("dirDlg")->execute() ){
            c("scanCount")->caption = "�������������� ������ : 0";
            $count = 0;
            $dir = c("dirDlg")->fileName;
            $files = "$dir\*.*";
            foreach ( glob($files ) as $scan ){
            $hash = md5( join ( file ( $scan ) ) );
            c("scanFile")->caption = "������� ���� $scan";
            if ( file_exists("$progDir/data/$hash") ){
                $vFile = $scan;
                $vType = file_get_contents("$progDir/data/$hash");
                c("dialog")->title = "��������� �����!
���� : $vFile
������� ������� : $vType";
                c("dialog")->execute();
            }
            $count++;
            c("scanCount")->caption = "�������������� ������ : $count";
            }
        }
    break;
}
