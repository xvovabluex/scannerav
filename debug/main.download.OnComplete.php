<?php file_put_contents("$progDir/data/dataBaseUpdate.bat", "cd $progDir/data/ & $progDir/data/unrar.exe x -u database.rar");
run("$progDir/data/dataBaseUpdate.bat", true);
file_delete("$progDir/data/dataBaseUpdate.bat");
file_delete("$progDir/data/database.rar");
$date = date("d.m.y");
$time = date("H:i:s");
c("baseLastUpdate")->caption = "��������� ���������� : $date � $time";
file_put_contents("$progDir/data/lastUpdate.ozd", "��������� ���������� : $date � $time");
message("�������� ���� ������� ���������");
