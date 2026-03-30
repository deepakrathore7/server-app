<?php
namespace App\Spatial;
class LineString {
    protected array $points;
    public function __construct(array $points) { $this->points = $points; }
    public function getPoints(): array { return $this->points; }
    public function toWkt(): string {
        $coords = array_map(fn($p) => $p->getLng() . ' ' . $p->getLat(), $this->points);
        return 'LINESTRING(' . implode(', ', $coords) . ')';
    }
}
