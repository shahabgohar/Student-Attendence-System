<?php
namespace App\ReuseableCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

trait InitModelWithProperties{
    public function initiWithValues(string $table_name,array $values_in_array){
        $userColumnList = Schema::getColumnListing($table_name);
        foreach ($userColumnList as $column){
            if($column == 'password'){
                $this->$column = Hash::make($values_in_array[$column]);
                continue;
            }

            if(array_key_exists($column,$values_in_array)){
                $this->$column = $values_in_array[$column];
            }
        }
    }
}
