<?php

namespace MasterF\PMFrame\Object;

use pocketmine\scheduler\Task;
use MasterF\PMFrame\PMFrame;

class PFTask extends Task {

  private $func;
  private $pararm;

  public function __construct($func, ...$params) {
    $this->func = $func;
    $this->param = new PFArray($params);
  }

  public function onRun($tick) {
    ($this->func)();
  }

}
