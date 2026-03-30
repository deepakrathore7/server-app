<?php
namespace App\Spatial;
class Polygon {
    protected array $lineStrings;
    public function __construct(array $lineStrings) { $this->lineStrings = $lineStrings; }
    public function getLineStrings(): array { return $this->lineStrings; }
    public function toWkt(): string {
        $coords = array_map(fn($p) => $p->getLng() . ' ' . $p->getLat(), $this->lineStrings[0]->getPoints());
        return 'POLYGON((' . implode(', ', $coords) . '))';
    }
}
