<?php

namespace MasterF\Test;

use pocketmine\plugin\PLuginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use MasterF\PMFrame\PMFrame; //これの宣言のみでおｋ

class BasicPlugin extends PluginBase implements Listener{

  public function onEnable() {
    PMFrame::PF()->registerEvents($this);
  }

  public function onJoin(PlayerJoinEvent $ev) {
    $player = PMFrame::PF($ev->getPlayer());//こんな感じ
    $player->getLevel()->sendTip($player->getName()."がログインしました");
  }
}
