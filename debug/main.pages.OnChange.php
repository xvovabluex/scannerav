<?php switch ( $self->pageIndex ){
    case 0:
        c("scan")->toFront();
    break;
    case 1:
        c("base")->toFront();
        c("about")->toFront();
    break;
    case 1:
        c("about")->toFront();
    break;
}
