<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\SheetCollection;

class ExportController extends Controller
{
    public function index()
    {
        if(Auth()->User()->hasRole('Admin')){
            return view('export');
        }
        else{
            abort(404);
        }
    }

    public function download(Request $request)
    {
        if(Auth()->User()->hasRole('Admin')){
            $schedule = Schedule::query();
            if($request->start && $request->end){
                $schedules = $schedule->whereBetween('start', [$request->start, $request->end]);
            }
            $schedules = $schedule->get();
            $model = [];
            $i = 0;
            foreach($schedules as $schedule){
                if($schedule->orders->approves->payments()->exists()){
                    if($schedule->orders->approves->payments->costs()->exists()){
                        foreach ($schedule->orders->approves->payments->costs as $cost) {
                            $model[$i]['No'] = $i+1;
                            $model[$i]['No Formulir'] = $schedule->orders->bookings->no_form;
                            $model[$i]['No Registrasi'] = $schedule->orders->approves->no_regis;

                            $model[$i]['No Invoice'] = $schedule->orders->approves->payments->no_invoice;
                            $model[$i]['No Receipt'] = $schedule->orders->approves->payments->no_receipt;

                            $model[$i]['Nama Pengguna'] = $schedule->orders->users->name;
                            $model[$i]['Alat'] = $schedule->orders->tools->name;
                            $model[$i]['Tujuan'] = $schedule->orders->purpose;
                            $model[$i]['Deskripsi Sampel'] = $schedule->orders->sample;
                            $model[$i]['Preparasi Khusus'] = $schedule->orders->unique;
                            $model[$i]['Start'] = $schedule->start;
                            $model[$i]['End'] = $schedule->end;
                            $model[$i]['Service'] = $cost->service;
                            $model[$i]['Harga'] = $cost->price;
                            $model[$i]['Kuantitas'] = $cost->quantity;
                            $model[$i]['Total'] = (int)$cost->quantity * (int)$cost->price;
                            $i++;
                        }
                    } else {
                        $model[$i]['No'] = $i+1;
                        $model[$i]['No Formulir'] = $schedule->orders->bookings->no_form;
                        $model[$i]['No Registrasi'] = $schedule->orders->approves->no_regis;

                        $model[$i]['No Invoice'] = $schedule->orders->approves->payments->no_invoice;
                        $model[$i]['No Receipt'] = $schedule->orders->approves->payments->no_receipt;

                        $model[$i]['Nama Pengguna'] = $schedule->orders->users->name;
                        $model[$i]['Alat'] = $schedule->orders->tools->name;
                        $model[$i]['Tujuan'] = $schedule->orders->purpose;
                        $model[$i]['Deskripsi Sampel'] = $schedule->orders->sample;
                        $model[$i]['Preparasi Khusus'] = $schedule->orders->unique;
                        $model[$i]['Start'] = $schedule->start;
                        $model[$i]['End'] = $schedule->end;
                        $model[$i]['Service'] = null;
                        $model[$i]['Harga'] = null;
                        $model[$i]['Kuantitas'] = null;
                        $model[$i]['Total'] = null;
                        $i++;
                    }
                }
                else {
                    $model[$i]['No'] = $i+1;
                    $model[$i]['No Formulir'] = $schedule->orders->bookings->no_form;
                    $model[$i]['No Registrasi'] = $schedule->orders->approves->no_regis;
                    if($schedule->orders->approves->payments()->exists()){
                        $model[$i]['No Invoice'] = $schedule->orders->approves->payments->no_invoice;
                        $model[$i]['No Receipt'] = $schedule->orders->approves->payments->no_receipt;
                    }
                    else{
                        $model[$i]['No Invoice'] = null;
                        $model[$i]['No Receipt'] = null;
                    }
                    $model[$i]['Nama Pengguna'] = $schedule->orders->users->name;
                    $model[$i]['Alat'] = $schedule->orders->tools->name;
                    $model[$i]['Tujuan'] = $schedule->orders->purpose;
                    $model[$i]['Deskripsi Sampel'] = $schedule->orders->sample;
                    $model[$i]['Preparasi Khusus'] = $schedule->orders->unique;
                    $model[$i]['Start'] = $schedule->start;
                    $model[$i]['End'] = $schedule->end;
                    $model[$i]['Service'] = null;
                    $model[$i]['Harga'] = null;
                    $model[$i]['Kuantitas'] = null;
                    $model[$i]['Total'] = null;
                    $i++;
                }
            }
            $sheets = new SheetCollection([
                $model,
            ]);
            return (new FastExcel($sheets))->download('file.xlsx');
        }
        else{
            abort(404);
        }
    }
}
