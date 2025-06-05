<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonsModel extends Model
{
    protected $table = 'polygons';

    protected $guarded = ['id'];

    public function geojson_polygons()
    {
        $polygons = DB::table($this->table)
            ->select([
                'polygons.id',
                DB::raw('ST_AsGeoJSON(polygons.geom) as geom'),
                'polygons.name',
                'polygons.description',
                DB::raw('ST_Area(polygons.geom, true) as luas_m2'),
                DB::raw('ST_Area(polygons.geom, true)/1000000 as luas_km2'),
                DB::raw('ST_Area(polygons.geom, true)/10000 as luas_hektar'),
                'polygons.created_at',
                'polygons.updated_at',
                'polygons.image',
                'polygons.user_id',
                'users.name as user_name'
            ])
            ->leftJoin('users', 'polygons.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $geometry = json_decode($p->geom);
            if (!$geometry) {
                $geometry = null;
            }

            $feature = [
                'type' => 'Feature',
                'geometry' => $geometry,
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                    'user_id' => $p->user_id,
                    'user_name' => $p->user_name,
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }

    public function geojson_polygon($id)
    {
        $polygons = DB::table($this->table)
            ->select([
                'polygons.id',
                DB::raw('ST_AsGeoJSON(polygons.geom) as geom'),
                'polygons.name',
                'polygons.description',
                DB::raw('ST_Area(polygons.geom, true) as luas_m2'),
                DB::raw('ST_Area(polygons.geom, true)/1000000 as luas_km2'),
                DB::raw('ST_Area(polygons.geom, true)/10000 as luas_hektar'),
                'polygons.created_at',
                'polygons.updated_at',
                'polygons.image',
                'polygons.user_id',
                'users.name as user_name',
                'users.created_at as user_created_at'
            ])
            ->leftJoin('users', 'polygons.user_id', '=', 'users.id')
            ->where('polygons.id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $geometry = json_decode($p->geom);
            if (!$geometry) {
                $geometry = null;
            }

            $feature = [
                'type' => 'Feature',
                'geometry' => $geometry,
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                    'user_id' => $p->user_id,
                    'user_name' => $p->user_name,
                    'user_created_at' => $p->user_created_at,
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }
}
