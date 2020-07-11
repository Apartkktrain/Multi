<?php
namespace apart\zisseki\Form;

use pocketmine\form\Form;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use apart\zisseki\Main;

class home implements Form
{
    private $name;
    
    public function handleResponse(Player $player, $data): void
    {

        if ($data === null) {
            //フォームが閉じられた場合
            $player->sendMessage("§6実績はまだまだたくさんあります!他の実績にもぜひチャレンジしてみましょう!!");
            return;//ここで処理を終了
        }
        switch ($data) {
            case 0:

                break;
            case 1:

                break;
            case 2:

                break;
            case 3:

                break;
        }
    }
    
    public function _construct(Player $player)
    {
    	$this->name = $player->getName();
    }

    public function jsonSerialize()
    {
        $name = $this->name;
        $a = $this->config->get($name);
        return [
            "type" => "form",
            "title" => "§l§6実績Manager",
            "content" => "実績を獲得しよう!報酬もアルゾ!",
            "buttons" => [
                [
                    "text" => "めざせ!採掘マスターへの道\n$a/100回",
                ],
                [
                    "text" => "原木マスター",
                ],
                [
                    "text" => "整地王",

                ],
                [
                    "text" => "PVP勢への道",
                ],
            ],
        ];
    }
}