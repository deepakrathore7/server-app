<?php
namespace App\Spatial;
class MultiPolygon {
    protected array $polygons;
    public function __construct(array $polygons) { $this->polygons = $polygons; }
    public function toWkt(): string {
        $polys = array_map(function($polygon) {
            if ($polygon instanceof Polygon) {
                $coords = array_map(fn($p) => $p->getLng() . ' ' . $p->getLat(), $polygon->getLineStrings()[0]->getPoints());
            } else {
                $coords = array_map(fn($p) => $p->getLng() . ' ' . $p->getLat(), $polygon);
            }
            return '((' . implode(', ', $coords) . '))';
        }, $this->polygons);
        return 'MULTIPOLYGON(' . implode(', ', $polys) . ')';
    }
}
