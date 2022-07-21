<?php

namespace App\Services;

use App\Models\Aplikasi;

class AplikasiService
{
	private $Aplikasi;

    public function __construct(Aplikasi $Aplikasi)
    {
        $this->Aplikasi = $Aplikasi;
    }

	public function all(){
		return $this->Aplikasi->query();
	}

    public function store($data){
        return $this->Aplikasi->create($data);
    }

    public function find($parentId){
        return $this->all()->where('parent_id', $parentId);
    }

}
