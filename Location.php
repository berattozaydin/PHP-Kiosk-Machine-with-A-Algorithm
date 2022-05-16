<?php
class Location{
    public function __construct(){

    }
    function getMap()
    {
        $map = array(
            array(' ', 0, 0, 0, 0, 'KIOSK1', 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 'STB', 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array('STAIRS', 0, 0, 0, 0, 0, 0, 0, 0, 'KIOSK2'),
            array(0, 0, 0, 0, 'ELEVATOR', 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 'LCW', 0, 0, 0, 0, 0, 'KTN', 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 'KIOSK3', 0, 0, 0, 0)
        );
        return $map;
    }
    function getSecondFloor()
    {
        $map = array(
            array(' ', 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array('STAIRS', 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 'ELEVATOR', 0, 0, 0, 0, 0),
            array(0, 0, 0, 'BGR', 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0)
        );
        return $map;
    }
}
