<?php
namespace App\Services;

use App\Core\Database\Database;

class TicketService
{
    private static $LOCK_TIME = 60 * 10;
    public static function isTicketLocked($ticketId)
    {
        $ticket = Database::queryOne("SELECT * FROM tickets WHERE id = ?", [$ticketId]);
        // KhoaDen	type = timestamp	
        $now = time();
        $lockTime = strtotime($ticket['KhoaDen']);
        return $now < $lockTime;
    }

    public static function lockTicket($ticketId)
    {
        $lockTime = time() + self::$LOCK_TIME;
        Database::query("UPDATE tickets SET KhoaDen = ? WHERE id = ?", [date('Y-m-d H:i:s', $lockTime), $ticketId]);
        return $lockTime;
    }

    public static function getAllTicketsOfShow($showId)
    {
        return Database::query("SELECT * FROM tickets WHERE MaSuatChieu = ?", [$showId]);
    }

}