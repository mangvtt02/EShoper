<?php
/**
 * @package php-font-lib
<<<<<<< HEAD
 * @link    https://github.com/dompdf/php-font-lib
=======
 * @link    https://github.com/PhenX/php-font-lib
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @author  Fabien Ménager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

namespace FontLib\Table\Type;
use FontLib\Table\Table;

/**
 * `hmtx` font table.
 *
 * @package php-font-lib
 */
class hmtx extends Table {
  protected function _parse() {
    $font   = $this->getFont();
    $offset = $font->pos();

    $numOfLongHorMetrics = $font->getData("hhea", "numOfLongHorMetrics");
    $numGlyphs           = $font->getData("maxp", "numGlyphs");

    $font->seek($offset);

    $data = array();
    $metrics = $font->readUInt16Many($numOfLongHorMetrics * 2);
    for ($gid = 0, $mid = 0; $gid < $numOfLongHorMetrics; $gid++) {
      $advanceWidth    = isset($metrics[$mid]) ? $metrics[$mid] : 0;
      $mid += 1;
      $leftSideBearing = isset($metrics[$mid]) ? $metrics[$mid] : 0;
      $mid += 1;
      $data[$gid]      = array($advanceWidth, $leftSideBearing);
    }

    if ($numOfLongHorMetrics < $numGlyphs) {
<<<<<<< HEAD
      $lastWidth = end($data)[0];
      $numLeft   = $numGlyphs - $numOfLongHorMetrics;
      $metrics   = $font->readUInt16Many($numLeft);
      for($i = 0; $i < $numLeft; $i++) {
        $gid             = $numOfLongHorMetrics + $i;
        $leftSideBearing = isset($metrics[$i]) ? $metrics[$i] : 0;
        $data[$gid]      = array($lastWidth, $leftSideBearing);
      }
=======
      $lastWidth = end($data);
      $data      = array_pad($data, $numGlyphs, $lastWidth);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    $this->data = $data;
  }

  protected function _encode() {
    $font   = $this->getFont();
    $subset = $font->getSubset();
    $data   = $this->data;

    $length = 0;

    foreach ($subset as $gid) {
      $length += $font->writeUInt16($data[$gid][0]);
      $length += $font->writeUInt16($data[$gid][1]);
    }

    return $length;
  }
}