<?php
require 'src/TesseractOCR.php';
require 'src/FriendlyErrors.php';
require 'src/Option.php';
require 'src/Command.php';

use thiagoalessio\TesseractOCR\TesseractOCR;
echo (new TesseractOCR('text.png'))->run();


   ?>