<?php
namespace App\Repository;

use App\Models\Booking;
use App\Models\User;
use App\DTO\BookingDTO;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use ReturnTypeWillChange;

class AdminRepository{
    public static function AllBooking(){
        // $bookings = Booking::all()
        // ->first()
        // ->orderBy('booking.bookingId','asc')->first();
        // return $bookings;

        return Booking::all();
    
    }
    public static function searchLike(){
        return Booking::all()->where("booking.roomId");
    }
    public static function getAllBookingAdmin($limit=5,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
        }


        return $bookingList;
    }

    public static function getallUsersBooking(){
        return Booking::select("user.userId","user.username","user.phone")
        ->join("user","booking.userId","=","user.userId")->get();
    }
    public static function getAllUers(){
        return User::select("user.userId","user.username","user.phone")->get();
    }
    public static function getSearchByAdmin($limit=5,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
        }


        return $bookingList;
    }
    public static function countBookingSearchByAdmin($userId,$roomName,$limit){
        $count = $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room','booking.roomId','=','room.roomId')
        ->where('room.roomName','like',"%{$roomName}")->get()->count();
        return (int)ceil($count/$limit);
    }
    public static function searchingallRoom($roomName,$userId){
        return Booking::select('booking.roomId','room.roomName','user.username','user.phone')
        ->join('room','room.roomId','=','booing','booking.roomId')
        ->join('user','user.userId','=','booking','booking.roomId')
        ->where('room.roomName','like',"%{$roomName}%")
        ->orderByDesc('booking.roomId')
        ->get();
    }
    }

    
?>