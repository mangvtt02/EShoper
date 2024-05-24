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
namespace FontLib\Table;

use FontLib\TrueType\File;
use FontLib\Font;
use FontLib\BinaryStream;

/**
 * Generic Font table directory entry.
 *
 * @package php-font-lib
 */
class DirectoryEntry extends BinaryStream {
  /**
   * @var File
   */
  protected $font;

  /**
   * @var Table
   */
  protected $font_table;

  public $entryLength = 4;

  public $tag;
  public $checksum;
  public $offset;
  public $length;

  protected $origF;

<<<<<<< HEAD
  /**
   * @param string $data
   *
   * @return int
   */
  static function computeChecksum($data) {
    $len = mb_strlen($data, '8bit');
=======
  static function computeChecksum($data) {
    $len = strlen($data);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    $mod = $len % 4;

    if ($mod) {
      $data = str_pad($data, $len + (4 - $mod), "\0");
    }

<<<<<<< HEAD
    $table = unpack("N*", $data);
    return array_sum($table);
=======
    $len = strlen($data);

    $hi = 0x0000;
    $lo = 0x0000;

    for ($i = 0; $i < $len; $i += 4) {
      $hi += (ord($data[$i]) << 8) + ord($data[$i + 1]);
      $lo += (ord($data[$i + 2]) << 8) + ord($data[$i + 3]);
      $hi += $lo >> 16;
      $lo = $lo & 0xFFFF;
      $hi = $hi & 0xFFFF;
    }

    return ($hi << 8) + $lo;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
  }

  function __construct(File $font) {
    $this->font = $font;
    $this->f    = $font->f;
  }

  function parse() {
    $this->tag = $this->font->read(4);
  }

  function open($filename, $mode = self::modeRead) {
    // void
  }

  function setTable(Table $font_table) {
    $this->font_table = $font_table;
  }

  function encode($entry_offset) {
    Font::d("\n==== $this->tag ====");
    //Font::d("Entry offset  = $entry_offset");

    $data = $this->font_table;
    $font = $this->font;

    $table_offset = $font->pos();
    $this->offset = $table_offset;
    $table_length = $data->encode();

<<<<<<< HEAD
    $font->seek($table_offset + $table_length);
    $pad = 0;
    $mod = $table_length % 4;
    if ($mod != 0) {
      $pad = 4 - $mod;
      $font->write(str_pad("", $pad, "\0"), $pad);
    }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    $font->seek($table_offset);
    $table_data = $font->read($table_length);

    $font->seek($entry_offset);

    $font->write($this->tag, 4);
    $font->writeUInt32(self::computeChecksum($table_data));
    $font->writeUInt32($table_offset);
    $font->writeUInt32($table_length);

    Font::d("Bytes written = $table_length");

<<<<<<< HEAD
    $font->seek($table_offset + $table_length + $pad);
=======
    $font->seek($table_offset + $table_length);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
  }

  /**
   * @return File
   */
  function getFont() {
    return $this->font;
  }

  function startRead() {
    $this->font->seek($this->offset);
  }

  function endRead() {
    //
  }

  function startWrite() {
    $this->font->seek($this->offset);
  }

  function endWrite() {
    //
  }
}

