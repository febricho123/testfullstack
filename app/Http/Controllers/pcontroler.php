<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pcontroler extends Controller
{
     public function up()
    {
    	Schema::create('produk' function(Blueprint $table)
    	{
    		$table->bigIncrements('id');
    		$table->string('nama_produk');
    		$table->integer('harga');
    		$table->timetamps();
    	}
    );
    }//
}
