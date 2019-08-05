<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_DocumentProperties
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 2009 - 2011 PHPWord (http://www.codeplex.com/PHPWord)
 */
class PHPWord_Template {

    /**
     * ZipArchive
     *
     * @var ZipArchive
     */
    private $_objZip;

    /**
     * Temporary Filename
     *
     * @var string
     */
    private $_tempFileName;

    /**
     * Document XML
     *
     * @var string
     */
    private $_documentXML;

    private $_header1XML;
private $_footer1XML;
private $_rels;
private $_types;
private $_countRels;



    /**
     * Create a new Template Object
     *
     * @param string $strFilename
     */
    public function __construct($strFilename) {
        $path = dirname($strFilename);
        $this->_tempFileName = $path.DIRECTORY_SEPARATOR.time().'.docx';

        copy($strFilename, $this->_tempFileName); // Copy the source File to the temp File

        $this->_objZip = new ZipArchive();
        $this->_objZip->open($this->_tempFileName);

        $this->_documentXML = $this->_objZip->getFromName('word/document.xml');
         $path = dirname($strFilename);


    $this->_header1XML  = $this->_objZip->getFromName('word/header1.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    $this->_footer1XML  = $this->_objZip->getFromName('word/footer1.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    $this->_rels        = $this->_objZip->getFromName('word/_rels/document.xml.rels'); #erap 07/07/2015
    $this->_types       = $this->_objZip->getFromName('[Content_Types].xml'); #erap 07/07/2015
    $this->_countRels   = substr_count($this->_rels, 'Relationship') - 1; #erap 07/07/2015
    }

    /**
     * Set a Template value
     *
     * @param mixed $search
     * @param mixed $replace
     */
    public function setValue($search, $replace) {
        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${'.$search.'}';
        }

        if(!is_array($replace)) {
            $replace = utf8_encode($replace);
        }

        $this->_documentXML = str_replace($search, $replace, $this->_documentXML);
        $this->_header1XML = str_replace($search, $replace, $this->_header1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    $this->_footer1XML = str_replace($search, $replace, $this->_footer1XML);
    }

    /**
     * Save Template
     *
     * @param string $strFilename
     */
    public function save($strFilename) {
        if(file_exists($strFilename)) {
            unlink($strFilename);
        }

        $this->_objZip->addFromString('word/document.xml', $this->_documentXML);
        $this->_objZip->addFromString('word/header1.xml', $this->_header1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    $this->_objZip->addFromString('word/footer1.xml', $this->_footer1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    $this->_objZip->addFromString('word/_rels/document.xml.rels', $this->_rels); #erap 07/07/2015
    $this->_objZip->addFromString('[Content_Types].xml', $this->_types); #erap 07/07/2015

        // Close zip file
        if($this->_objZip->close() === false) {
            throw new Exception('Could not close zip file.');
        }

        rename($this->_tempFileName, $strFilename);
    }

    public function replaceImage($path, $imageName) {
        $this->_objZip->deleteName('word/media/' . $imageName);
        $this->_objZip->addFile($path, 'word/media/' . $imageName);
    }
	public function replaceStrToImg( $strKey, $arrImgPath )
	{
		$strKey = '${'.$strKey.'}';
		if( !is_array($arrImgPath) )
			$arrImgPath = array($arrImgPath);

		$relationTmpl = '<Relationship Id="RID" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/IMG"/>';
		$imgTmpl = '<w:pict><v:shape type="#_x0000_t75" style="width:300px;height:300px"><v:imagedata r:id="RID" o:title=""/></v:shape></w:pict>';
		$typeTmpl = ' <Override PartName="/word/media/IMG" ContentType="image/EXT"/>';
		$toAdd = $toAddImg = $toAddType = '';
		$aSearch = array('RID', 'IMG');
		$aSearchType = array('IMG', 'EXT');

		foreach($arrImgPath as $img){
            $temproni = explode('.', $img);
			$imgExt = array_pop($temproni);
			if( in_array($imgExt, array('jpg', 'JPG') ) )
				$imgExt = 'jpeg';
			$imgName = 'img' . $this->_countRels . '.' . $imgExt;
			$rid = 'rId' . $this->_countRels++;

			$this->_objZip->addFile($img, 'word/media/' . $imgName);

			$toAddImg .= str_replace('RID', $rid, $imgTmpl) ;

			$aReplace = array($imgName, $imgExt);
			$toAddType .= str_replace($aSearchType, $aReplace, $typeTmpl) ;

			$aReplace = array($rid, $imgName);
			$toAdd .= str_replace($aSearch, $aReplace, $relationTmpl);
		}

		$this->_documentXML = str_replace('<w:t>' . $strKey . '</w:t>', $toAddImg, $this->_documentXML);
		$this->_types       = str_replace('</Types>', $toAddType, $this->_types) . '</Types>';
		$this->_rels        = str_replace('</Relationships>', $toAdd, $this->_rels) . '</Relationships>';
	}

    public function get_document_xml()
    {
        return $this->_documentXML;
    }
}
?>
