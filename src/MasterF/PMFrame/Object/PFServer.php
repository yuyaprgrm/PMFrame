<?php

namespace MasterF\PMFrame\Object;

use pocketmine\Server;

class PFServer {

  private $server;

  public function __construct(Server $server) {
    $this->server = $server;
  }

  public function getOnlinePlayers() {

    $players = [];

    foreach($this->server->getOnlinePlayers() as $player) {
      $players[] = new PFPlayer($player);
    }

    return new PFArray($players);
  }

  public function getLevels() {

    $levels = [];

    foreach($this->server->getLevels() as $level) {
      $levels[] = new PFLevel($level);
    }

    return new PFArray($levels);
  }

  public function registerEvents($listener, $plugin = null) {
    $plugin = $plugin ?? $listener;

    $this->server->getPluginManager()->registerEvents($listener, $plugin);
  }

  public function scheduleDelayedTask($func, $tick) {
    $this->server->getScheduler()->scheduleDelayedTask(new PFTask($func), $tick);
  }

  public function scheduleRepeatingTask($func, $tick) {
    $this->server->getScheduler()->scheduleRepeatingTask(new PFTask($func), $tick);
  }

}
