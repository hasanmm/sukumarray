<?php
//============================================================+
// File name   : tcpdf.php
// Version     : 6.2.12
// Begin       : 2002-08-03
// Last Update : 2015-06-18
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2002-2015 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description :
//   This is a PHP class for generating PDF documents without requiring external extensions.
//
// NOTE:
//   This class was originally derived in 2002 from the Public
//   Domain FPDF class by Olivier Plathey (http://www.fpdf.org),
//   but now is almost entirely rewritten and contains thousands of
//   new lines of code and hundreds new features.
//
// Main features:
//  * no external libraries are required for the basic functions;
//  * all standard page formats, custom page formats, custom margins and units of measure;
//  * UTF-8 Unicode and Right-To-Left languages;
//  * TrueTypeUnicode, TrueType, Type1 and CID-0 fonts;
//  * font subsetting;
//  * methods to publish some XHTML + CSS code, Javascript and Forms;
//  * images, graphic (geometric figures) and transformation methods;
//  * supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImagMagick (http://www.imagemagick.org/www/formats.html)
//  * 1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extension, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, Datamatrix, QR-Code, PDF417;
//  * JPEG and PNG ICC profiles, Grayscale, RGB, CMYK, Spot Colors and Transparencies;
//  * automatic page header and footer management;
//  * document encryption up to 256 bit and digital signature certifications;
//  * transactions to UNDO commands;
//  * PDF annotations, including links, text and file attachments;
//  * text rendering modes (fill, stroke and clipping);
//  * multiple columns mode;
//  * no-write page regions;
//  * bookmarks, named destinations and table of content;
//  * text hyphenation;
//  * text stretching and spacing (tracking);
//  * automatic page break, line break and text alignments including justification;
//  * automatic page numbering and page groups;
//  * move and delete pages;
//  * page compression (requires php-zlib extension);
//  * XOBject Templates;
//  * Layers and object visibility.
//	* PDF/A-1b support
//============================================================+

/**
 * @file
 * This is a PHP class for generating PDF documents without requiring external extensions.<br>
 * TCPDF project (http://www.tcpdf.org) was originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * <h3>TCPDF main features are:</h3>
 * <ul>
 * <li>no external libraries are required for the basic functions;</li>
 * <li>all standard page formats, custom page formats, custom margins and units of measure;</li>
 * <li>UTF-8 Unicode and Right-To-Left languages;</li>
 * <li>TrueTypeUnicode, TrueType, Type1 and CID-0 fonts;</li>
 * <li>font subsetting;</li>
 * <li>methods to publish some XHTML + CSS code, Javascript and Forms;</li>
 * <li>images, graphic (geometric figures) and transformation methods;
 * <li>supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImagMagick (http://www.imagemagick.org/www/formats.html)</li>
 * <li>1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extension, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, Datamatrix, QR-Code, PDF417;</li>
 * <li>JPEG and PNG ICC profiles, Grayscale, RGB, CMYK, Spot Colors and Transparencies;</li>
 * <li>automatic page header and footer management;</li>
 * <li>document encryption up to 256 bit and digital signature certifications;</li>
 * <li>transactions to UNDO commands;</li>
 * <li>PDF annotations, including links, text and file attachments;</li>
 * <li>text rendering modes (fill, stroke and clipping);</li>
 * <li>multiple columns mode;</li>
 * <li>no-write page regions;</li>
 * <li>bookmarks, named destinations and table of content;</li>
 * <li>text hyphenation;</li>
 * <li>text stretching and spacing (tracking);</li>
 * <li>automatic page break, line break and text alignments including justification;</li>
 * <li>automatic page numbering and page groups;</li>
 * <li>move and delete pages;</li>
 * <li>page compression (requires php-zlib extension);</li>
 * <li>XOBject Templates;</li>
 * <li>Layers and object visibility;</li>
 * <li>PDF/A-1b support.</li>
 * </ul>
 * Tools to encode your unicode fonts are on fonts/utils directory.</p>
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 6.2.8
 */

// TCPDF configuration
require_once(dirname(__FILE__).'/tcpdf_autoconfig.php');
// TCPDF static font methods and data
require_once(dirname(__FILE__).'/include/tcpdf_font_data.php');
// TCPDF static font methods and data
require_once(dirname(__FILE__).'/include/tcpdf_fonts.php');
// TCPDF static color methods and data
require_once(dirname(__FILE__).'/include/tcpdf_colors.php');
// TCPDF static image methods and data
require_once(dirname(__FILE__).'/include/tcpdf_images.php');
// TCPDF static methods and data
require_once(dirname(__FILE__).'/include/tcpdf_static.php');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

/**
 * @class TCPDF
 * PHP class for generating PDF documents without requiring external extensions.
 * TCPDF project (http://www.tcpdf.org) has been originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * @package com.tecnick.tcpdf
 * @brief PHP class for generating PDF documents without requiring external extensions.
 * @version 6.2.8
 * @author Nicola Asuni - info@tecnick.com
 */
class TCPDF {

	// Protected properties

	/**
	 * Current page number.
	 * @protected
	 */
	protected $page;

	/**
	 * Current object number.
	 * @protected
	 */
	protected $n;

	/**
	 * Array of object offsets.
	 * @protected
	 */
	protected $offsets = array();

	/**
	 * Array of object IDs for each page.
	 * @protected
	 */
	protected $pageobjects = array();

	/**
	 * Buffer holding in-memory PDF.
	 * @protected
	 */
	protected $buffer;

	/**
	 * Array containing pages.
	 * @protected
	 */
	protected $pages = array();

	/**
	 * Current document state.
	 * @protected
	 */
	protected $state;

	/**
	 * Compression flag.
	 * @protected
	 */
	protected $compress;

	/**
	 * Current page orientation (P = Portrait, L = Landscape).
	 * @protected
	 */
	protected $CurOrientation;

	/**
	 * Page dimensions.
	 * @protected
	 */
	protected $pagedim = array();

	/**
	 * Scale factor (number of points in user unit).
	 * @protected
	 */
	protected $k;

	/**
	 * Width of page format in points.
	 * @protected
	 */
	protected $fwPt;

	/**
	 * Height of page format in points.
	 * @protected
	 */
	protected $fhPt;

	/**
	 * Current width of page in points.
	 * @protected
	 */
	protected $wPt;

	/**
	 * Current height of page in points.
	 * @protected
	 */
	protected $hPt;

	/**
	 * Current width of page in user unit.
	 * @protected
	 */
	protected $w;

	/**
	 * Current height of page in user unit.
	 * @protected
	 */
	protected $h;

	/**
	 * Left margin.
	 * @protected
	 */
	protected $lMargin;

	/**
	 * Right margin.
	 * @protected
	 */
	protected $rMargin;

	/**
	 * Cell left margin (used by regions).
	 * @protected
	 */
	protected $clMargin;

	/**
	 * Cell right margin (used by regions).
	 * @protected
	 */
	protected $crMargin;

	/**
	 * Top margin.
	 * @protected
	 */
	protected $tMargin;

	/**
	 * Page break margin.
	 * @protected
	 */
	protected $bMargin;

	/**
	 * Array of cell internal paddings ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
	 * @since 5.9.000 (2010-10-03)
	 * @protected
	 */
	protected $cell_padding = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * Array of cell margins ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
	 * @since 5.9.000 (2010-10-04)
	 * @protected
	 */
	protected $cell_margin = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * Current horizontal position in user unit for cell positioning.
	 * @protected
	 */
	protected $x;

	/**
	 * Current vertical position in user unit for cell positioning.
	 * @protected
	 */
	protected $y;

	/**
	 * Height of last cell printed.
	 * @protected
	 */
	protected $lasth;

	/**
	 * Line width in user unit.
	 * @protected
	 */
	protected $LineWidth;

	/**
	 * Array of standard font names.
	 * @protected
	 */
	protected $CoreFonts;

	/**
	 * Array of used fonts.
	 * @protected
	 */
	protected $fonts = array();

	/**
	 * Array of font files.
	 * @protected
	 */
	protected $FontFiles = array();

	/**
	 * Array of encoding differences.
	 * @protected
	 */
	protected $diffs = array();

	/**
	 * Array of used images.
	 * @protected
	 */
	protected $images = array();

	/**
	 * Depth of the svg tag, to keep track if the svg tag is a subtag or the root tag.
	 * @protected
	 */
	protected $svg_tag_depth = 0;

	/**
	 * Array of Annotations in pages.
	 * @protected
	 */
	protected $PageAnnots = array();

	/**
	 * Array of internal links.
	 * @protected
	 */
	protected $links = array();

	/**
	 * Current font family.
	 * @protected
	 */
	protected $FontFamily;

	/**
	 * Current font style.
	 * @protected
	 */
	protected $FontStyle;

	/**
	 * Current font ascent (distance between font top and baseline).
	 * @protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontAscent;

	/**
	 * Current font descent (distance between font bottom and baseline).
	 * @protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontDescent;

	/**
	 * Underlining flag.
	 * @protected
	 */
	protected $underline;

	/**
	 * Overlining flag.
	 * @protected
	 */
	protected $overline;

	/**
	 * Current font info.
	 * @protected
	 */
	protected $CurrentFont;

	/**
	 * Current font size in points.
	 * @protected
	 */
	protected $FontSizePt;

	/**
	 * Current font size in user unit.
	 * @protected
	 */
	protected $FontSize;

	/**
	 * Commands for drawing color.
	 * @protected
	 */
	protected $DrawColor;

	/**
	 * Commands for filling color.
	 * @protected
	 */
	protected $FillColor;

	/**
	 * Commands for text color.
	 * @protected
	 */
	protected $TextColor;

	/**
	 * Indicates whether fill and text colors are different.
	 * @protected
	 */
	protected $ColorFlag;

	/**
	 * Automatic page breaking.
	 * @protected
	 */
	protected $AutoPageBreak;

	/**
	 * Threshold used to trigger page breaks.
	 * @protected
	 */
	protected $PageBreakTrigger;

	/**
	 * Flag set when processing page header.
	 * @protected
	 */
	protected $InHeader = false;

	/**
	 * Flag set when processing page footer.
	 * @protected
	 */
	protected $InFooter = false;

	/**
	 * Zoom display mode.
	 * @protected
	 */
	protected $ZoomMode;

	/**
	 * Layout display mode.
	 * @protected
	 */
	protected $LayoutMode;

	/**
	 * If true set the document information dictionary in Unicode.
	 * @protected
	 */
	protected $docinfounicode = true;

	/**
	 * Document title.
	 * @protected
	 */
	protected $title = '';

	/**
	 * Document subject.
	 * @protected
	 */
	protected $subject = '';

	/**
	 * Document author.
	 * @protected
	 */
	protected $author = '';

	/**
	 * Document keywords.
	 * @protected
	 */
	protected $keywords = '';

	/**
	 * Document creator.
	 * @protected
	 */
	protected $creator = '';

	/**
	 * Starting page number.
	 * @protected
	 */
	protected $starting_page_number = 1;

	/**
	 * The right-bottom (or left-bottom for RTL) corner X coordinate of last inserted image.
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $img_rb_x;

	/**
	 * The right-bottom corner Y coordinate of last inserted image.
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $img_rb_y;

	/**
	 * Adjusting factor to convert pixels to user units.
	 * @since 2004-06-14
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $imgscale = 1;

	/**
	 * Boolean flag set to true when the input text is unicode (require unicode fonts).
	 * @since 2005-01-02
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $isunicode = false;

	/**
	 * PDF version.
	 * @since 1.5.3
	 * @protected
	 */
	protected $PDFVersion = '1.7';

	/**
	 * ID of the stored default header template (-1 = not set).
	 * @protected
	 */
	protected $header_xobjid = false;

	/**
	 * If true reset the Header Xobject template at each page
	 * @protected
	 */
	protected $header_xobj_autoreset = false;

	/**
	 * Minimum distance between header and top page margin.
	 * @protected
	 */
	protected $header_margin;

	/**
	 * Minimum distance between footer and bottom page margin.
	 * @protected
	 */
	protected $footer_margin;

	/**
	 * Original left margin value.
	 * @protected
	 * @since 1.53.0.TC013
	 */
	protected $original_lMargin;

	/**
	 * Original right margin value.
	 * @protected
	 * @since 1.53.0.TC013
	 */
	protected $original_rMargin;

	/**
	 * Default font used on page header.
	 * @protected
	 */
	protected $header_font;

	/**
	 * Default font used on page footer.
	 * @protected
	 */
	protected $footer_font;

	/**
	 * Language templates.
	 * @protected
	 */
	protected $l;

	/**
	 * Barcode to print on page footer (only if set).
	 * @protected
	 */
	protected $barcode = false;

	/**
	 * Boolean flag to print/hide page header.
	 * @protected
	 */
	protected $print_header = true;

	/**
	 * Boolean flag to print/hide page footer.
	 * @protected
	 */
	protected $print_footer = true;

	/**
	 * Header image logo.
	 * @protected
	 */
	protected $header_logo = '';

	/**
	 * Width of header image logo in user units.
	 * @protected
	 */
	protected $header_logo_width = 30;

	/**
	 * Title to be printed on default page header.
	 * @protected
	 */
	protected $header_title = '';

	/**
	 * String to pring on page header after title.
	 * @protected
	 */
	protected $header_string = '';

	/**
	 * Color for header text (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $header_text_color = array(0,0,0);

	/**
	 * Color for header line (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $header_line_color = array(0,0,0);

	/**
	 * Color for footer text (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $footer_text_color = array(0,0,0);

	/**
	 * Color for footer line (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $footer_line_color = array(0,0,0);

	/**
	 * Text shadow data array.
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $txtshadow = array('enabled'=>false, 'depth_w'=>0, 'depth_h'=>0, 'color'=>false, 'opacity'=>1, 'blend_mode'=>'Normal');

	/**
	 * Default number of columns for html table.
	 * @protected
	 */
	protected $default_table_columns = 4;

	// variables for html parser

	/**
	 * HTML PARSER: array to store current link and rendering styles.
	 * @protected
	 */
	protected $HREF = array();

	/**
	 * List of available fonts on filesystem.
	 * @protected
	 */
	protected $fontlist = array();

	/**
	 * Current foreground color.
	 * @protected
	 */
	protected $fgcolor;

	/**
	 * HTML PARSER: array of boolean values, true in case of ordered list (OL), false otherwise.
	 * @protected
	 */
	protected $listordered = array();

	/**
	 * HTML PARSER: array count list items on nested lists.
	 * @protected
	 */
	protected $listcount = array();

	/**
	 * HTML PARSER: current list nesting level.
	 * @protected
	 */
	protected $listnum = 0;

	/**
	 * HTML PARSER: indent amount for lists.
	 * @protected
	 */
	protected $listindent = 0;

	/**
	 * HTML PARSER: current list indententation level.
	 * @protected
	 */
	protected $listindentlevel = 0;

	/**
	 * Current background color.
	 * @protected
	 */
	protected $bgcolor;

	/**
	 * Temporary font size in points.
	 * @protected
	 */
	protected $tempfontsize = 10;

	/**
	 * Spacer string for LI tags.
	 * @protected
	 */
	protected $lispacer = '';

	/**
	 * Default encoding.
	 * @protected
	 * @since 1.53.0.TC010
	 */
	protected $encoding = 'UTF-8';

	/**
	 * PHP internal encoding.
	 * @protected
	 * @since 1.53.0.TC016
	 */
	protected $internal_encoding;

	/**
	 * Boolean flag to indicate if the document language is Right-To-Left.
	 * @protected
	 * @since 2.0.000
	 */
	protected $rtl = false;

	/**
	 * Boolean flag used to force RTL or LTR string direction.
	 * @protected
	 * @since 2.0.000
	 */
	protected $tmprtl = false;

	// --- Variables used for document encryption:

	/**
	 * IBoolean flag indicating whether document is protected.
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $encrypted;

	/**
	 * Array containing encryption settings.
	 * @protected
	 * @since 5.0.005 (2010-05-11)
	 */
	protected $encryptdata = array();

	/**
	 * Last RC4 key encrypted (cached for optimisation).
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key;

	/**
	 * Last RC4 computed key.
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key_c;

	/**
	 * File ID (used on document trailer).
	 * @protected
	 * @since 5.0.005 (2010-05-12)
	 */
	protected $file_id;

	// --- bookmark ---

	/**
	 * Outlines for bookmark.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $outlines = array();

	/**
	 * Outline root for bookmark.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $OutlineRoot;

	// --- javascript and form ---

	/**
	 * Javascript code.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $javascript = '';

	/**
	 * Javascript counter.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $n_js;

	/**
	 * line through state
	 * @protected
	 * @since 2.8.000 (2008-03-19)
	 */
	protected $linethrough;

	/**
	 * Array with additional document-wide usage rights for the document.
	 * @protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $ur = array();

	/**
	 * DPI (Dot Per Inch) Document Resolution (do not change).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $dpi = 72;

	/**
	 * Array of page numbers were a new page group was started (the page numbers are the keys of the array).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $newpagegroup = array();

	/**
	 * Array that contains the number of pages in each page group.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $pagegroups = array();

	/**
	 * Current page group number.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $currpagegroup = 0;

	/**
	 * Array of transparency objects and parameters.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $extgstates;

	/**
	 * Set the default JPEG compression quality (1-100).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $jpeg_quality;

	/**
	 * Default cell height ratio.
	 * @protected
	 * @since 3.0.014 (2008-05-23)
	 */
	protected $cell_height_ratio = K_CELL_HEIGHT_RATIO;

	/**
	 * PDF viewer preferences.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $viewer_preferences;

	/**
	 * A name object specifying how the document should be displayed when opened.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $PageMode;

	/**
	 * Array for storing gradient information.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $gradients = array();

	/**
	 * Array used to store positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 3.2.000 (2008-06-26)
	 */
	protected $intmrk = array();

	/**
	 * Array used to store positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 5.7.000 (2010-08-03)
	 */
	protected $bordermrk = array();

	/**
	 * Array used to store page positions to track empty pages (keys are the page numbers).
	 * @protected
	 * @since 5.8.007 (2010-08-18)
	 */
	protected $emptypagemrk = array();

	/**
	 * Array used to store content positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 4.6.021 (2009-07-20)
	 */
	protected $cntmrk = array();

	/**
	 * Array used to store footer positions of each page.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $footerpos = array();

	/**
	 * Array used to store footer length of each page.
	 * @protected
	 * @since 4.0.014 (2008-07-29)
	 */
	protected $footerlen = array();

	/**
	 * Boolean flag to indicate if a new line is created.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $newline = true;

	/**
	 * End position of the latest inserted line.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $endlinex = 0;

	/**
	 * PDF string for width value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleWidth = '';

	/**
	 * PDF string for CAP value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleCap = '0 J';

	/**
	 * PDF string for join value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleJoin = '0 j';

	/**
	 * PDF string for dash value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleDash = '[] 0 d';

	/**
	 * Boolean flag to indicate if marked-content sequence is open.
	 * @protected
	 * @since 4.0.013 (2008-07-28)
	 */
	protected $openMarkedContent = false;

	/**
	 * Count the latest inserted vertical spaces on HTML.
	 * @protected
	 * @since 4.0.021 (2008-08-24)
	 */
	protected $htmlvspace = 0;

	/**
	 * Array of Spot colors.
	 * @protected
	 * @since 4.0.024 (2008-09-12)
	 */
	protected $spot_colors = array();

	/**
	 * Symbol used for HTML unordered list items.
	 * @protected
	 * @since 4.0.028 (2008-09-26)
	 */
	protected $lisymbol = '';

	/**
	 * String used to mark the beginning and end of EPS image blocks.
	 * @protected
	 * @since 4.1.000 (2008-10-18)
	 */
	protected $epsmarker = 'x#!#EPS#!#x';

	/**
	 * Array of transformation matrix.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $transfmatrix = array();

	/**
	 * Current key for transformation matrix.
	 * @protected
	 * @since 4.8.005 (2009-09-17)
	 */
	protected $transfmatrix_key = 0;

	/**
	 * Booklet mode for double-sided pages.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $booklet = false;

	/**
	 * Epsilon value used for float calculations.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $feps = 0.005;

	/**
	 * Array used for custom vertical spaces for HTML tags.
	 * @protected
	 * @since 4.2.001 (2008-10-30)
	 */
	protected $tagvspaces = array();

	/**
	 * HTML PARSER: custom indent amount for lists. Negative value means disabled.
	 * @protected
	 * @since 4.2.007 (2008-11-12)
	 */
	protected $customlistindent = -1;

	/**
	 * Boolean flag to indicate if the border of the cell sides that cross the page should be removed.
	 * @protected
	 * @since 4.2.010 (2008-11-14)
	 */
	protected $opencell = true;

	/**
	 * Array of files to embedd.
	 * @protected
	 * @since 4.4.000 (2008-12-07)
	 */
	protected $embeddedfiles = array();

	/**
	 * Boolean flag to indicate if we are inside a PRE tag.
	 * @protected
	 * @since 4.4.001 (2008-12-08)
	 */
	protected $premode = false;

	/**
	 * Array used to store positions of graphics transformation blocks inside the page buffer.
	 * keys are the page numbers
	 * @protected
	 * @since 4.4.002 (2008-12-09)
	 */
	protected $transfmrk = array();

	/**
	 * Default color for html links.
	 * @protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkColorArray = array(0, 0, 255);

	/**
	 * Default font style to add to html links.
	 * @protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkFontStyle = 'U';

	/**
	 * Counts the number of pages.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numpages = 0;

	/**
	 * Array containing page lengths in bytes.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $pagelen = array();

	/**
	 * Counts the number of pages.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numimages = 0;

	/**
	 * Store the image keys.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $imagekeys = array();

	/**
	 * Length of the buffer in bytes.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $bufferlen = 0;

	/**
	 * Counts the number of fonts.
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $numfonts = 0;

	/**
	 * Store the font keys.
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $fontkeys = array();

	/**
	 * Store the font object IDs.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $font_obj_ids = array();

	/**
	 * Store the fage status (true when opened, false when closed).
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $pageopen = array();

	/**
	 * Default monospace font.
	 * @protected
	 * @since 4.5.025 (2009-03-10)
	 */
	protected $default_monospaced_font = 'courier';

	/**
	 * Cloned copy of the current class object.
	 * @protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $objcopy;

	/**
	 * Array used to store the lengths of cache files.
	 * @protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $cache_file_length = array();

	/**
	 * Table header content to be repeated on each new page.
	 * @protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $thead = '';

	/**
	 * Margins used for table header.
	 * @protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $theadMargins = array();

	/**
	 * Boolean flag to enable document digital signature.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $sign = false;

	/**
	 * Digital signature data.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_data = array();

	/**
	 * Digital signature max length.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_max_length = 11742;

	/**
	 * Data for digital signature appearance.
	 * @protected
	 * @since 5.3.011 (2010-06-16)
	 */
	protected $signature_appearance = array('page' => 1, 'rect' => '0 0 0 0');

	/**
	 * Array of empty digital signature appearances.
	 * @protected
	 * @since 5.9.101 (2011-07-06)
	 */
	protected $empty_signature_appearance = array();

	/**
	 * Boolean flag to enable document timestamping with TSA.
	 * @protected
	 * @since 6.0.085 (2014-06-19)
	 */
	protected $tsa_timestamp = false;

	/**
	 * Timestamping data.
	 * @protected
	 * @since 6.0.085 (2014-06-19)
	 */
	protected $tsa_data = array();

	/**
	 * Regular expression used to find blank characters (required for word-wrapping).
	 * @protected
	 * @since 4.6.006 (2009-04-28)
	 */
	protected $re_spaces = '/[^\S\xa0]/';

	/**
	 * Array of $re_spaces parts.
	 * @protected
	 * @since 5.5.011 (2010-07-09)
	 */
	protected $re_space = array('p' => '[^\S\xa0]', 'm' => '');

	/**
	 * Digital signature object ID.
	 * @protected
	 * @since 4.6.022 (2009-06-23)
	 */
	protected $sig_obj_id = 0;

	/**
	 * ID of page objects.
	 * @protected
	 * @since 4.7.000 (2009-08-29)
	 */
	protected $page_obj_id = array();

	/**
	 * List of form annotations IDs.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_obj_id = array();

	/**
	 * Deafult Javascript field properties. Possible values are described on official Javascript for Acrobat API reference. Annotation options can be directly specified using the 'aopt' entry.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $default_form_prop = array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 255), 'strokeColor'=>array(128, 128, 128));

	/**
	 * Javascript objects array.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $js_objects = array();

	/**
	 * Current form action (used during XHTML rendering).
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_action = '';

	/**
	 * Current form encryption type (used during XHTML rendering).
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_enctype = 'application/x-www-form-urlencoded';

	/**
	 * Current method to submit forms.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_mode = 'post';

	/**
	 * List of fonts used on form fields (fontname => fontkey).
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $annotation_fonts = array();

	/**
	 * List of radio buttons parent objects.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radiobutton_groups = array();

	/**
	 * List of radio group objects IDs.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radio_groups = array();

	/**
	 * Text indentation value (used for text-indent CSS attribute).
	 * @protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $textindent = 0;

	/**
	 * Store page number when startTransaction() is called.
	 * @protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $start_transaction_page = 0;

	/**
	 * Store Y position when startTransaction() is called.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $start_transaction_y = 0;

	/**
	 * True when we are printing the thead section on a new page.
	 * @protected
	 * @since 4.8.027 (2010-01-25)
	 */
	protected $inthead = false;

	/**
	 * Array of column measures (width, space, starting Y position).
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $columns = array();

	/**
	 * Number of colums.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $num_columns = 1;

	/**
	 * Current column number.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $current_column = 0;

	/**
	 * Starting page for columns.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $column_start_page = 0;

	/**
	 * Maximum page and column selected.
	 * @protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $maxselcol = array('page' => 0, 'column' => 0);

	/**
	 * Array of: X difference between table cell x start and starting page margin, cellspacing, cellpadding.
	 * @protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $colxshift = array('x' => 0, 's' => array('H' => 0, 'V' => 0), 'p' => array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0));

	/**
	 * Text rendering mode: 0 = Fill text; 1 = Stroke text; 2 = Fill, then stroke text; 3 = Neither fill nor stroke text (invisible); 4 = Fill text and add to path for clipping; 5 = Stroke text and add to path for clipping; 6 = Fill, then stroke text and add to path for clipping; 7 = Add text to path for clipping.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textrendermode = 0;

	/**
	 * Text stroke width in doc units.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textstrokewidth = 0;

	/**
	 * Current stroke color.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $strokecolor;

	/**
	 * Default unit of measure for document.
	 * @protected
	 * @since 5.0.000 (2010-04-22)
	 */
	protected $pdfunit = 'mm';

	/**
	 * Boolean flag true when we are on TOC (Table Of Content) page.
	 * @protected
	 */
	protected $tocpage = false;

	/**
	 * Boolean flag: if true convert vector images (SVG, EPS) to raster image using GD or ImageMagick library.
	 * @protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $rasterize_vector_images = false;

	/**
	 * Boolean flag: if true enables font subsetting by default.
	 * @protected
	 * @since 5.3.002 (2010-06-07)
	 */
	protected $font_subsetting = true;

	/**
	 * Array of default graphic settings.
	 * @protected
	 * @since 5.5.008 (2010-07-02)
	 */
	protected $default_graphic_vars = array();

	/**
	 * Array of XObjects.
	 * @protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $xobjects = array();

	/**
	 * Boolean value true when we are inside an XObject.
	 * @protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $inxobj = false;

	/**
	 * Current XObject ID.
	 * @protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $xobjid = '';

	/**
	 * Percentage of character stretching.
	 * @protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_stretching = 100;

	/**
	 * Increases or decreases the space between characters in a text by the specified amount (tracking).
	 * @protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_spacing = 0;

	/**
	 * Array of no-write regions.
	 * ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right)
	 * @protected
	 * @since 5.9.003 (2010-10-14)
	 */
	protected $page_regions = array();

	/**
	 * Boolean value true when page region check is active.
	 * @protected
	 */
	protected $check_page_regions = true;

	/**
	 * Array of PDF layers data.
	 * @protected
	 * @since 5.9.102 (2011-07-13)
	 */
	protected $pdflayers = array();

	/**
	 * A dictionary of names and corresponding destinations (Dests key on document Catalog).
	 * @protected
	 * @since 5.9.097 (2011-06-23)
	 */
	protected $dests = array();

	/**
	 * Object ID for Named Destinations
	 * @protected
	 * @since 5.9.097 (2011-06-23)
	 */
	protected $n_dests;

	/**
	 * Embedded Files Names
	 * @protected
	 * @since 5.9.204 (2013-01-23)
	 */
	protected $efnames = array();

	/**
	 * Directory used for the last SVG image.
	 * @protected
	 * @since 5.0.000 (2010-05-05)
	 */
	protected $svgdir = '';

	/**
	 *  Deafult unit of measure for SVG.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgunit = 'px';

	/**
	 * Array of SVG gradients.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradients = array();

	/**
	 * ID of last SVG gradient.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradientid = 0;

	/**
	 * Boolean value true when in SVG defs group.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefsmode = false;

	/**
	 * Array of SVG defs.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefs = array();

	/**
	 * Boolean value true when in SVG clipPath tag.
	 * @protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $svgclipmode = false;

	/**
	 * Array of SVG clipPath commands.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclippaths = array();

	/**
	 * Array of SVG clipPath tranformation matrix.
	 * @protected
	 * @since 5.8.022 (2010-08-31)
	 */
	protected $svgcliptm = array();

	/**
	 * ID of last SVG clipPath.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclipid = 0;

	/**
	 * SVG text.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgtext = '';

	/**
	 * SVG text properties.
	 * @protected
	 * @since 5.8.013 (2010-08-23)
	 */
	protected $svgtextmode = array();

	/**
	 * Array of SVG properties.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgstyles = array(array(
		'alignment-baseline' => 'auto',
		'baseline-shift' => 'baseline',
		'clip' => 'auto',
		'clip-path' => 'none',
		'clip-rule' => 'nonzero',
		'color' => 'black',
		'color-interpolation' => 'sRGB',
		'color-interpolation-filters' => 'linearRGB',
		'color-profile' => 'auto',
		'color-rendering' => 'auto',
		'cursor' => 'auto',
		'direction' => 'ltr',
		'display' => 'inline',
		'dominant-baseline' => 'auto',
		'enable-background' => 'accumulate',
		'fill' => 'black',
		'fill-opacity' => 1,
		'fill-rule' => 'nonzero',
		'filter' => 'none',
		'flood-color' => 'black',
		'flood-opacity' => 1,
		'font' => '',
		'font-family' => 'helvetica',
		'font-size' => 'medium',
		'font-size-adjust' => 'none',
		'font-stretch' => 'normal',
		'font-style' => 'normal',
		'font-variant' => 'normal',
		'font-weight' => 'normal',
		'glyph-orientation-horizontal' => '0deg',
		'glyph-orientation-vertical' => 'auto',
		'image-rendering' => 'auto',
		'kerning' => 'auto',
		'letter-spacing' => 'normal',
		'lighting-color' => 'white',
		'marker' => '',
		'marker-end' => 'none',
		'marker-mid' => 'none',
		'marker-start' => 'none',
		'mask' => 'none',
		'opacity' => 1,
		'overflow' => 'auto',
		'pointer-events' => 'visiblePainted',
		'shape-rendering' => 'auto',
		'stop-color' => 'black',
		'stop-opacity' => 1,
		'stroke' => 'none',
		'stroke-dasharray' => 'none',
		'stroke-dashoffset' => 0,
		'stroke-linecap' => 'butt',
		'stroke-linejoin' => 'miter',
		'stroke-miterlimit' => 4,
		'stroke-opacity' => 1,
		'stroke-width' => 1,
		'text-anchor' => 'start',
		'text-decoration' => 'none',
		'text-rendering' => 'auto',
		'unicode-bidi' => 'normal',
		'visibility' => 'visible',
		'word-spacing' => 'normal',
		'writing-mode' => 'lr-tb',
		'text-color' => 'black',
		'transfmatrix' => array(1, 0, 0, 1, 0, 0)
		));

	/**
	 * If true force sRGB color profile for all document.
	 * @protected
	 * @since 5.9.121 (2011-09-28)
	 */
	protected $force_srgb = false;

	/**
	 * If true set the document to PDF/A mode.
	 * @protected
	 * @since 5.9.121 (2011-09-27)
	 */
	protected $pdfa_mode = false;

	/**
	 * Document creation date-time
	 * @protected
	 * @since 5.9.152 (2012-03-22)
	 */
	protected $doc_creation_timestamp;

	/**
	 * Document modification date-time
	 * @protected
	 * @since 5.9.152 (2012-03-22)
	 */
	protected $doc_modification_timestamp;

	/**
	 * Custom XMP data.
	 * @protected
	 * @since 5.9.128 (2011-10-06)
	 */
	protected $custom_xmp = '';

	/**
	 * Overprint mode array.
	 * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $overprint = array('OP' => false, 'op' => false, 'OPM' => 0);

	/**
	 * Alpha mode array.
	 * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $alpha = array('CA' => 1, 'ca' => 1, 'BM' => '/Normal', 'AIS' => false);

	/**
	 * Define the page boundaries boxes to be set on document.
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $page_boxes = array('MediaBox', 'CropBox', 'BleedBox', 'TrimBox', 'ArtBox');

	/**
	 * If true print TCPDF meta link.
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $tcpdflink = true;

	/**
	 * Cache array for computed GD gamma values.
	 * @protected
	 * @since 5.9.1632 (2012-06-05)
	 */
	protected $gdgammacache = array();

	//------------------------------------------------------------
	// METHODS
	//------------------------------------------------------------

	/**
	 * This is the class constructor.
	 * It allows to set up the page format, the orientation and the measure unit used in all the methods (except for the font sizes).
	 * 
	 * IMPORTANT: Please note that this method sets the mb_internal_encoding to ASCII, so if you are using the mbstring module functions with TCPDF you need to correctly set/unset the mb_internal_encoding when needed.
	 * 
	 * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
	 * @param $unit (string) User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
	 * @param $format (miis->re_space['p'].'+<img/'.$this->re_space['m'], chr(32).'<img', $html);
		$html = preg_replace('/<img([^\>]*)>[\s]+([^\<])/xi', '<img\\1>&nbsp;\\2', $html);
		$html = preg_replace('/<img([^\>]*)>/xi', '<img\\1><span><marker style="font-size:0"/></span>', $html);
		$html = preg_replace('/<xre/', '<pre', $html); // restore pre tag
		$html = preg_replace('/<textarea([^\>]*)>([^\<]*)<\/textarea>/xi', '<textarea\\1 value="\\2" />', $html);
		$html = preg_replace('/<li([^\>]*)><\/li>/', '<li\\1>&nbsp;</li>', $html);
		$html = preg_replace('/<li([^\>]*)>'.$this->re_space['p'].'*<img/'.$this->re_space['m'], '<li\\1><font size="1">&nbsp;</font><img', $html);
		$html = preg_replace('/<([^\>\/]*)>[\s]/', '<\\1>&nbsp;', $html); // preserve some spaces
		$html = preg_replace('/[\s]<\/([^\>]*)>/', '&nbsp;</\\1>', $html); // preserve some spaces
		$html = preg_replace('/<su([bp])/', '<zws/><su\\1', $html); // fix sub/sup alignment
		$html = preg_replace('/<\/su([bp])>/', '</su\\1><zws/>', $html); // fix sub/sup alignment
		$html = preg_replace('/'.$this->re_space['p'].'+/'.$this->re_space['m'], chr(32), $html); // replace multiple spaces with a single space
		// trim string
		$html = $this->stringTrim($html);
		// fix br tag after li
		$html = preg_replace('/<li><br([^\>]*)>/', '<li> <br\\1>', $html);
		// fix first image tag alignment
		$html = preg_replace('/^<img/', '<span style="font-size:0"><br /></span> <img', $html, 1);
		// pattern for generic tag
		$tagpattern = '/(<[^>]+>)/';
		// explodes the string
		$a = preg_split($tagpattern, $html, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
		// count elements
		$maxel = count($a);
		$elkey = 0;
		$key = 0;
		// create an array of elements
		$dom = array();
		$dom[$key] = array();
		// set inheritable properties fot the first void element
		// possible inheritable properties are: azimuth, border-collapse, border-spacing, caption-side, color, cursor, direction, empty-cells, font, font-family, font-stretch, font-size, font-size-adjust, font-style, font-variant, font-weight, letter-spacing, line-height, list-style, list-style-image, list-style-position, list-style-type, orphans, page, page-break-inside, quotes, speak, speak-header, text-align, text-indent, text-transform, volume, white-space, widows, word-spacing
		$dom[$key]['tag'] = false;
		$dom[$key]['block'] = false;
		$dom[$key]['value'] = '';
		$dom[$key]['parent'] = 0;
		$dom[$key]['hide'] = false;
		$dom[$key]['fontname'] = $this->FontFamily;
		$dom[$key]['fontstyle'] = $this->FontStyle;
		$dom[$key]['fontsize'] = $this->FontSizePt;
		$dom[$key]['font-stretch'] = $this->font_stretching;
		$dom[$key]['letter-spacing'] = $this->font_spacing;
		$dom[$key]['stroke'] = $this->textstrokewidth;
		$dom[$key]['fill'] = (($this->textrendermode % 2) == 0);
		$dom[$key]['clip'] = ($this->textrendermode > 3);
		$dom[$key]['line-height'] = $this->cell_height_ratio;
		$dom[$key]['bgcolor'] = false;
		$dom[$key]['fgcolor'] = $this->fgcolor; // color
		$dom[$key]['strokecolor'] = $this->strokecolor;
		$dom[$key]['align'] = '';
		$dom[$key]['listtype'] = '';
		$dom[$key]['text-indent'] = 0;
		$dom[$key]['text-transform'] = '';
		$dom[$key]['border'] = array();
		$dom[$key]['dir'] = $this->rtl?'rtl':'ltr';
		$thead = false; // true when we are inside the THEAD tag
		++$key;
		$level = array();
		array_push($level, 0); // root
		while ($elkey < $maxel) {
			$dom[$key] = array();
			$element = $a[$elkey];
			$dom[$key]['elkey'] = $elkey;
			if (preg_match($tagpattern, $element)) {
				// html tag
				$element = substr($element, 1, -1);
				// get tag name
				preg_match('/[\/]?([a-zA-Z0-9]*)/', $element, $tag);
				$tagname = strtolower($tag[1]);
				// check if we are inside a table header
				if ($tagname == 'thead') {
					if ($element[0] == '/') {
						$thead = false;
					} else {
						$thead = true;
					}
					++$elkey;
					continue;
				}
				$dom[$key]['tag'] = true;
				$dom[$key]['value'] = $tagname;
				if (in_array($dom[$key]['value'], $blocktags)) {
					$dom[$key]['block'] = true;
				} else {
					$dom[$key]['block'] = false;
				}
				if ($element[0] == '/') {
					// *** closing html tag
					$dom[$key]['opening'] = false;
					$dom[$key]['parent'] = end($level);
					array_pop($level);
					$dom[$key]['hide'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['hide'];
					$dom[$key]['fontname'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['fontname'];
					$dom[$key]['fontstyle'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['fontstyle'];
					$dom[$key]['fontsize'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['fontsize'];
					$dom[$key]['font-stretch'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['font-stretch'];
					$dom[$key]['letter-spacing'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['letter-spacing'];
					$dom[$key]['stroke'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['stroke'];
					$dom[$key]['fill'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['fill'];
					$dom[$key]['clip'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['clip'];
					$dom[$key]['line-height'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['line-height'];
					$dom[$key]['bgcolor'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['bgcolor'];
					$dom[$key]['fgcolor'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['fgcolor'];
					$dom[$key]['strokecolor'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['strokecolor'];
					$dom[$key]['align'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['align'];
					$dom[$key]['text-transform'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['text-transform'];
					$dom[$key]['dir'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['dir'];
					if (isset($dom[($dom[($dom[$key]['parent'])]['parent'])]['listtype'])) {
						$dom[$key]['listtype'] = $dom[($dom[($dom[$key]['parent'])]['parent'])]['listtype'];
					}
					// set the number of columns in table tag
					if (($dom[$key]['value'] == 'tr') AND (!isset($dom[($dom[($dom[$key]['parent'])]['parent'])]['cols']))) {
						$dom[($dom[($dom[$key]['parent'])]['parent'])]['cols'] = $dom[($dom[$key]['parent'])]['cols'];
					}
					if (($dom[$key]['value'] == 'td') OR ($dom[$key]['value'] == 'th')) {
						$dom[($dom[$key]['parent'])]['content'] = $csstagarray;
						for ($i = ($dom[$key]['parent'] + 1); $i < $key; ++$i) {
							$dom[($dom[$key]['parent'])]['content'] .= stripslashes($a[$dom[$i]['elkey']]);
						}
						$key = $i;
						// mark nested tables
						$dom[($dom[$key]['parent'])]['content'] = str_replace('<table', '<table nested="true"', $dom[($dom[$key]['parent'])]['content']);
						// remove thead sections from nested tables
						$dom[($dom[$key]['parent'])]['content'] = str_replace('<thead>', '', $dom[($dom[$key]['parent'])]['content']);
						$dom[($dom[$key]['parent'])]['content'] = str_replace('</thead>', '', $dom[($dom[$key]['parent'])]['content']);
					}
					// store header rows on a new table
					if (($dom[$key]['value'] == 'tr') AND ($dom[($dom[$key]['parent'])]['thead'] === true)) {
						if (TCPDF_STATIC::empty_string($dom[($dom[($dom[$key]['parent'])]['parent'])]['thead'])) {
							$dom[($dom[($dom[$key]['parent'])]['parent'])]['thead'] = $csstagarray.$a[$dom[($dom[($dom[$key]['parent'])]['parent'])]['elkey']];
						}
						for ($i = $dom[$key]['parent']; $i <= $key; ++$i) {
							$dom[($dom[($dom[$key]['parent'])]['parent'])]['thead'] .= $a[$dom[$i]['elkey']];
						}
						if (!isset($dom[($dom[$key]['parent'])]['attribute'])) {
							$dom[($dom[$key]['parent'])]['attribute'] = array();
						}
						// header elements must be always contained in a single page
						$dom[($dom[$key]['parent'])]['attribute']['nobr'] = 'true';
					}
					if (($dom[$key]['value'] == 'table') AND (!TCPDF_STATIC::empty_string($dom[($dom[$key]['parent'])]['thead']))) {
						// remove the nobr attributes from the table header
						$dom[($dom[$key]['parent'])]['thead'] = str_replace(' nobr="true"', '', $dom[($dom[$key]['parent'])]['thead']);
						$dom[($dom[$key]['parent'])]['thead'] .= '</tablehead>';
					}
				} else {
					// *** opening or self-closing html tag
					$dom[$key]['opening'] = true;
					$dom[$key]['parent'] = end($level);
					if ((substr($element, -1, 1) == '/') OR (in_array($dom[$key]['value'], $selfclosingtags))) {
						// self-closing tag
						$dom[$key]['self'] = true;
					} else {
						// opening tag
						array_push($level, $key);
						$dom[$key]['self'] = false;
					}
					// copy some values from parent
					$parentkey = 0;
					if ($key > 0) {
						$parentkey = $dom[$key]['parent'];
						$dom[$key]['hide'] = $dom[$parentkey]['hide'];
						$dom[$key]['fontname'] = $dom[$parentkey]['fontname'];
						$dom[$key]['fontstyle'] = $dom[$parentkey]['fontstyle'];
						$dom[$key]['fontsize'] = $dom[$parentkey]['fontsize'];
						$dom[$key]['font-stretch'] = $dom[$parentkey]['font-stretch'];
						$dom[$key]['letter-spacing'] = $dom[$parentkey]['letter-spacing'];
						$dom[$key]['stroke'] = $dom[$parentkey]['stroke'];
						$dom[$key]['fill'] = $dom[$parentkey]['fill'];
						$dom[$key]['clip'] = $dom[$parentkey]['clip'];
						$dom[$key]['line-height'] = $dom[$parentkey]['line-height'];
						$dom[$key]['bgcolor'] = $dom[$parentkey]['bgcolor'];
						$dom[$key]['fgcolor'] = $dom[$parentkey]['fgcolor'];
						$dom[$key]['strokecolor'] = $dom[$parentkey]['strokecolor'];
						$dom[$key]['align'] = $dom[$parentkey]['align'];
						$dom[$key]['listtype'] = $dom[$parentkey]['listtype'];
						$dom[$key]['text-indent'] = $dom[$parentkey]['text-indent'];
						$dom[$key]['text-transform'] = $dom[$parentkey]['text-transform'];
						$dom[$key]['border'] = array();
						$dom[$key]['dir'] = $dom[$parentkey]['dir'];
					}
					// get attributes
					preg_match_all('/([^=\s]*)[\s]*=[\s]*"([^"]*)"/', $element, $attr_array, PREG_PATTERN_ORDER);
					$dom[$key]['attribute'] = array(); // reset attribute array
					while (list($id, $name) = each($attr_array[1])) {
						$dom[$key]['attribute'][strtolower($name)] = $attr_array[2][$id];
					}
					if (!empty($css)) {
						// merge CSS style to current style
						list($dom[$key]['csssel'], $dom[$key]['cssdata']) = TCPDF_STATIC::getCSSdataArray($dom, $key, $css);
						$dom[$key]['attribute']['style'] = TCPDF_STATIC::getTagStyleFromCSSarray($dom[$key]['cssdata']);
					}
					// split style attributes
					if (isset($dom[$key]['attribute']['style']) AND !empty($dom[$key]['attribute']['style'])) {
						// get style attributes
						preg_match_all('/([^;:\s]*):([^;]*)/', $dom[$key]['attribute']['style'], $style_array, PREG_PATTERN_ORDER);
						$dom[$key]['style'] = array(); // reset style attribute array
						while (list($id, $name) = each($style_array[1])) {
							// in case of duplicate attribute the last replace the previous
							$dom[$key]['style'][strtolower($name)] = trim($style_array[2][$id]);
						}
						// --- get some style attributes ---
						// text direction
						if (isset($dom[$key]['style']['direction'])) {
							$dom[$key]['dir'] = $dom[$key]['style']['direction'];
						}
						// display
						if (isset($dom[$key]['style']['display'])) {
							$dom[$key]['hide'] = (trim(strtolower($dom[$key]['style']['display'])) == 'none');
						}
						// font family
						if (isset($dom[$key]['style']['font-family'])) {
							$dom[$key]['fontname'] = $this->getFontFamilyName($dom[$key]['style']['font-family']);
						}
						// list-style-type
						if (isset($dom[$key]['style']['list-style-type'])) {
							$dom[$key]['listtype'] = trim(strtolower($dom[$key]['style']['list-style-type']));
							if ($dom[$key]['listtype'] == 'inherit') {
								$dom[$key]['listtype'] = $dom[$parentkey]['listtype'];
							}
						}
						// text-indent
						if (isset($dom[$key]['style']['text-indent'])) {
							$dom[$key]['text-indent'] = $this->getHTMLUnitToUnits($dom[$key]['style']['text-indent']);
							if ($dom[$key]['text-indent'] == 'inherit') {
								$dom[$key]['text-indent'] = $dom[$parentkey]['text-indent'];
							}
						}
						// text-transform
						if (isset($dom[$key]['style']['text-transform'])) {
							$dom[$key]['text-transform'] = $dom[$key]['style']['text-transform'];
						}
						// font size
						if (isset($dom[$key]['style']['font-size'])) {
							$fsize = trim($dom[$key]['style']['font-size']);
							$dom[$key]['fontsize'] = $this->getHTMLFontUnits($fsize, $dom[0]['fontsize'], $dom[$parentkey]['fontsize'], 'pt');
						}
						// font-stretch
						if (isset($dom[$key]['style']['font-stretch'])) {
							$dom[$key]['font-stretch'] = $this->getCSSFontStretching($dom[$key]['style']['font-stretch'], $dom[$parentkey]['font-stretch']);
						}
						// letter-spacing
						if (isset($dom[$key]['style']['letter-spacing'])) {
							$dom[$key]['letter-spacing'] = $this->getCSSFontSpacing($dom[$key]['style']['letter-spacing'], $dom[$parentkey]['letter-spacing']);
						}
						// line-height (internally is the cell height ratio)
						if (isset($dom[$key]['style']['line-height'])) {
							$lineheight = trim($dom[$key]['style']['line-height']);
							switch ($lineheight) {
								// A normal line height. This is default
								case 'normal': {
									$dom[$key]['line-height'] = $dom[0]['line-height'];
									break;
								}
								case 'inherit': {
									$dom[$key]['line-height'] = $dom[$parentkey]['line-height'];
								}
								default: {
									if (is_numeric($lineheight)) {
										// convert to percentage of font height
										$lineheight = ($lineheight * 100).'%';
									}
									$dom[$key]['line-height'] = $this->getHTMLUnitToUnits($lineheight, 1, '%', true);
									if (substr($lineheight, -1) !== '%') {
										if ($dom[$key]['fontsize'] <= 0) {
											$dom[$key]['line-height'] = 1;
										} else {
											$dom[$key]['line-height'] = (($dom[$key]['line-height'] - $this->cell_padding['T'] - $this->cell_padding['B']) / $dom[$key]['fontsize']);
										}
									}
								}
							}
						}
						// font style
						if (isset($dom[$key]['style']['font-weight'])) {
							if (strtolower($dom[$key]['style']['font-weight'][0]) == 'n') {
								if (strpos($dom[$key]['fontstyle'], 'B') !== false) {
									$dom[$key]['fontstyle'] = str_replace('B', '', $dom[$key]['fontstyle']);
								}
							} elseif (strtolower($dom[$key]['style']['font-weight'][0]) == 'b') {
								$dom[$key]['fontstyle'] .= 'B';
							}
						}
						if (isset($dom[$key]['style']['font-style']) AND (strtolower($dom[$key]['style']['font-style'][0]) == 'i')) {
							$dom[$key]['fontstyle'] .= 'I';
						}
						// font color
						if (isset($dom[$key]['style']['color']) AND (!TCPDF_STATIC::empty_string($dom[$key]['style']['color']))) {
							$dom[$key]['fgcolor'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['style']['color'], $this->spot_colors);
						} elseif ($dom[$key]['value'] == 'a') {
							$dom[$key]['fgcolor'] = $this->htmlLinkColorArray;
						}
						// background color
						if (isset($dom[$key]['style']['background-color']) AND (!TCPDF_STATIC::empty_string($dom[$key]['style']['background-color']))) {
							$dom[$key]['bgcolor'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['style']['background-color'], $this->spot_colors);
						}
						// text-decoration
						if (isset($dom[$key]['style']['text-decoration'])) {
							$decors = explode(' ', strtolower($dom[$key]['style']['text-decoration']));
							foreach ($decors as $dec) {
								$dec = trim($dec);
								if (!TCPDF_STATIC::empty_string($dec)) {
									if ($dec[0] == 'u') {
										// underline
										$dom[$key]['fontstyle'] .= 'U';
									} elseif ($dec[0] == 'l') {
										// line-through
										$dom[$key]['fontstyle'] .= 'D';
									} elseif ($dec[0] == 'o') {
										// overline
										$dom[$key]['fontstyle'] .= 'O';
									}
								}
							}
						} elseif ($dom[$key]['value'] == 'a') {
							$dom[$key]['fontstyle'] = $this->htmlLinkFontStyle;
						}
						// check for width attribute
						if (isset($dom[$key]['style']['width'])) {
							$dom[$key]['width'] = $dom[$key]['style']['width'];
						}
						// check for height attribute
						if (isset($dom[$key]['style']['height'])) {
							$dom[$key]['height'] = $dom[$key]['style']['height'];
						}
						// check for text alignment
						if (isset($dom[$key]['style']['text-align'])) {
							$dom[$key]['align'] = strtoupper($dom[$key]['style']['text-align'][0]);
						}
						// check for CSS border properties
						if (isset($dom[$key]['style']['border'])) {
							$borderstyle = $this->getCSSBorderStyle($dom[$key]['style']['border']);
							if (!empty($borderstyle)) {
								$dom[$key]['border']['LTRB'] = $borderstyle;
							}
						}
						if (isset($dom[$key]['style']['border-color'])) {
							$brd_colors = preg_split('/[\s]+/', trim($dom[$key]['style']['border-color']));
							if (isset($brd_colors[3])) {
								$dom[$key]['border']['L']['color'] = TCPDF_COLORS::convertHTMLColorToDec($brd_colors[3], $this->spot_colors);
							}
							if (isset($brd_colors[1])) {
								$dom[$key]['border']['R']['color'] = TCPDF_COLORS::convertHTMLColorToDec($brd_colors[1], $this->spot_colors);
							}
							if (isset($brd_colors[0])) {
								$dom[$key]['border']['T']['color'] = TCPDF_COLORS::convertHTMLColorToDec($brd_colors[0], $this->spot_colors);
							}
							if (isset($brd_colors[2])) {
								$dom[$key]['border']['B']['color'] = TCPDF_COLORS::convertHTMLColorToDec($brd_colors[2], $this->spot_colors);
							}
						}
						if (isset($dom[$key]['style']['border-width'])) {
							$brd_widths = preg_split('/[\s]+/', trim($dom[$key]['style']['border-width']));
							if (isset($brd_widths[3])) {
								$dom[$key]['border']['L']['width'] = $this->getCSSBorderWidth($brd_widths[3]);
							}
							if (isset($brd_widths[1])) {
								$dom[$key]['border']['R']['width'] = $this->getCSSBorderWidth($brd_widths[1]);
							}
							if (isset($brd_widths[0])) {
								$dom[$key]['border']['T']['width'] = $this->getCSSBorderWidth($brd_widths[0]);
							}
							if (isset($brd_widths[2])) {
								$dom[$key]['border']['B']['width'] = $this->getCSSBorderWidth($brd_widths[2]);
							}
						}
						if (isset($dom[$key]['style']['border-style'])) {
							$brd_styles = preg_split('/[\s]+/', trim($dom[$key]['style']['border-style']));
							if (isset($brd_styles[3]) AND ($brd_styles[3]!='none')) {
								$dom[$key]['border']['L']['cap'] = 'square';
								$dom[$key]['border']['L']['join'] = 'miter';
								$dom[$key]['border']['L']['dash'] = $this->getCSSBorderDashStyle($brd_styles[3]);
								if ($dom[$key]['border']['L']['dash'] < 0) {
									$dom[$key]['border']['L'] = array();
								}
							}
							if (isset($brd_styles[1])) {
								$dom[$key]['border']['R']['cap'] = 'square';
								$dom[$key]['border']['R']['join'] = 'miter';
								$dom[$key]['border']['R']['dash'] = $this->getCSSBorderDashStyle($brd_styles[1]);
								if ($dom[$key]['border']['R']['dash'] < 0) {
									$dom[$key]['border']['R'] = array();
								}
							}
							if (isset($brd_styles[0])) {
								$dom[$key]['border']['T']['cap'] = 'square';
								$dom[$key]['border']['T']['join'] = 'miter';
								$dom[$key]['border']['T']['dash'] = $this->getCSSBorderDashStyle($brd_styles[0]);
								if ($dom[$key]['border']['T']['dash'] < 0) {
									$dom[$key]['border']['T'] = array();
								}
							}
							if (isset($brd_styles[2])) {
								$dom[$key]['border']['B']['cap'] = 'square';
								$dom[$key]['border']['B']['join'] = 'miter';
								$dom[$key]['border']['B']['dash'] = $this->getCSSBorderDashStyle($brd_styles[2]);
								if ($dom[$key]['border']['B']['dash'] < 0) {
									$dom[$key]['border']['B'] = array();
								}
							}
						}
						$cellside = array('L' => 'left', 'R' => 'right', 'T' => 'top', 'B' => 'bottom');
						foreach ($cellside as $bsk => $bsv) {
							if (isset($dom[$key]['style']['border-'.$bsv])) {
								$borderstyle = $this->getCSSBorderStyle($dom[$key]['style']['border-'.$bsv]);
								if (!empty($borderstyle)) {
									$dom[$key]['border'][$bsk] = $borderstyle;
								}
							}
							if (isset($dom[$key]['style']['border-'.$bsv.'-color'])) {
								$dom[$key]['border'][$bsk]['color'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['style']['border-'.$bsv.'-color'], $this->spot_colors);
							}
							if (isset($dom[$key]['style']['border-'.$bsv.'-width'])) {
								$dom[$key]['border'][$bsk]['width'] = $this->getCSSBorderWidth($dom[$key]['style']['border-'.$bsv.'-width']);
							}
							if (isset($dom[$key]['style']['border-'.$bsv.'-style'])) {
								$dom[$key]['border'][$bsk]['dash'] = $this->getCSSBorderDashStyle($dom[$key]['style']['border-'.$bsv.'-style']);
								if ($dom[$key]['border'][$bsk]['dash'] < 0) {
									$dom[$key]['border'][$bsk] = array();
								}
							}
						}
						// check for CSS padding properties
						if (isset($dom[$key]['style']['padding'])) {
							$dom[$key]['padding'] = $this->getCSSPadding($dom[$key]['style']['padding']);
						} else {
							$dom[$key]['padding'] = $this->cell_padding;
						}
						foreach ($cellside as $psk => $psv) {
							if (isset($dom[$key]['style']['padding-'.$psv])) {
								$dom[$key]['padding'][$psk] = $this->getHTMLUnitToUnits($dom[$key]['style']['padding-'.$psv], 0, 'px', false);
							}
						}
						// check for CSS margin properties
						if (isset($dom[$key]['style']['margin'])) {
							$dom[$key]['margin'] = $this->getCSSMargin($dom[$key]['style']['margin']);
						} else {
							$dom[$key]['margin'] = $this->cell_margin;
						}
						foreach ($cellside as $psk => $psv) {
							if (isset($dom[$key]['style']['margin-'.$psv])) {
								$dom[$key]['margin'][$psk] = $this->getHTMLUnitToUnits(str_replace('auto', '0', $dom[$key]['style']['margin-'.$psv]), 0, 'px', false);
							}
						}
						// check for CSS border-spacing properties
						if (isset($dom[$key]['style']['border-spacing'])) {
							$dom[$key]['border-spacing'] = $this->getCSSBorderMargin($dom[$key]['style']['border-spacing']);
						}
						// page-break-inside
						if (isset($dom[$key]['style']['page-break-inside']) AND ($dom[$key]['style']['page-break-inside'] == 'avoid')) {
							$dom[$key]['attribute']['nobr'] = 'true';
						}
						// page-break-before
						if (isset($dom[$key]['style']['page-break-before'])) {
							if ($dom[$key]['style']['page-break-before'] == 'always') {
								$dom[$key]['attribute']['pagebreak'] = 'true';
							} elseif ($dom[$key]['style']['page-break-before'] == 'left') {
								$dom[$key]['attribute']['pagebreak'] = 'left';
							} elseif ($dom[$key]['style']['page-break-before'] == 'right') {
								$dom[$key]['attribute']['pagebreak'] = 'right';
							}
						}
						// page-break-after
						if (isset($dom[$key]['style']['page-break-after'])) {
							if ($dom[$key]['style']['page-break-after'] == 'always') {
								$dom[$key]['attribute']['pagebreakafter'] = 'true';
							} elseif ($dom[$key]['style']['page-break-after'] == 'left') {
								$dom[$key]['attribute']['pagebreakafter'] = 'left';
							} elseif ($dom[$key]['style']['page-break-after'] == 'right') {
								$dom[$key]['attribute']['pagebreakafter'] = 'right';
							}
						}
					}
					if (isset($dom[$key]['attribute']['display'])) {
						$dom[$key]['hide'] = (trim(strtolower($dom[$key]['attribute']['display'])) == 'none');
					}
					if (isset($dom[$key]['attribute']['border']) AND ($dom[$key]['attribute']['border'] != 0)) {
						$borderstyle = $this->getCSSBorderStyle($dom[$key]['attribute']['border'].' solid black');
						if (!empty($borderstyle)) {
							$dom[$key]['border']['LTRB'] = $borderstyle;
						}
					}
					// check for font tag
					if ($dom[$key]['value'] == 'font') {
						// font family
						if (isset($dom[$key]['attribute']['face'])) {
							$dom[$key]['fontname'] = $this->getFontFamilyName($dom[$key]['attribute']['face']);
						}
						// font size
						if (isset($dom[$key]['attribute']['size'])) {
							if ($key > 0) {
								if ($dom[$key]['attribute']['size'][0] == '+') {
									$dom[$key]['fontsize'] = $dom[($dom[$key]['parent'])]['fontsize'] + intval(substr($dom[$key]['attribute']['size'], 1));
								} elseif ($dom[$key]['attribute']['size'][0] == '-') {
									$dom[$key]['fontsize'] = $dom[($dom[$key]['parent'])]['fontsize'] - intval(substr($dom[$key]['attribute']['size'], 1));
								} else {
									$dom[$key]['fontsize'] = intval($dom[$key]['attribute']['size']);
								}
							} else {
								$dom[$key]['fontsize'] = intval($dom[$key]['attribute']['size']);
							}
						}
					}
					// force natural alignment for lists
					if ((($dom[$key]['value'] == 'ul') OR ($dom[$key]['value'] == 'ol') OR ($dom[$key]['value'] == 'dl'))
						AND (!isset($dom[$key]['align']) OR TCPDF_STATIC::empty_string($dom[$key]['align']) OR ($dom[$key]['align'] != 'J'))) {
						if ($this->rtl) {
							$dom[$key]['align'] = 'R';
						} else {
							$dom[$key]['align'] = 'L';
						}
					}
					if (($dom[$key]['value'] == 'small') OR ($dom[$key]['value'] == 'sup') OR ($dom[$key]['value'] == 'sub')) {
						if (!isset($dom[$key]['attribute']['size']) AND !isset($dom[$key]['style']['font-size'])) {
							$dom[$key]['fontsize'] = $dom[$key]['fontsize'] * K_SMALL_RATIO;
						}
					}
					if (($dom[$key]['value'] == 'strong') OR ($dom[$key]['value'] == 'b')) {
						$dom[$key]['fontstyle'] .= 'B';
					}
					if (($dom[$key]['value'] == 'em') OR ($dom[$key]['value'] == 'i')) {
						$dom[$key]['fontstyle'] .= 'I';
					}
					if ($dom[$key]['value'] == 'u') {
						$dom[$key]['fontstyle'] .= 'U';
					}
					if (($dom[$key]['value'] == 'del') OR ($dom[$key]['value'] == 's') OR ($dom[$key]['value'] == 'strike')) {
						$dom[$key]['fontstyle'] .= 'D';
					}
					if (!isset($dom[$key]['style']['text-decoration']) AND ($dom[$key]['value'] == 'a')) {
						$dom[$key]['fontstyle'] = $this->htmlLinkFontStyle;
					}
					if (($dom[$key]['value'] == 'pre') OR ($dom[$key]['value'] == 'tt')) {
						$dom[$key]['fontname'] = $this->default_monospaced_font;
					}
					if (!empty($dom[$key]['value']) AND ($dom[$key]['value'][0] == 'h') AND (intval($dom[$key]['value']{1}) > 0) AND (intval($dom[$key]['value']{1}) < 7)) {
						// headings h1, h2, h3, h4, h5, h6
						if (!isset($dom[$key]['attribute']['size']) AND !isset($dom[$key]['style']['font-size'])) {
							$headsize = (4 - intval($dom[$key]['value']{1})) * 2;
							$dom[$key]['fontsize'] = $dom[0]['fontsize'] + $headsize;
						}
						if (!isset($dom[$key]['style']['font-weight'])) {
							$dom[$key]['fontstyle'] .= 'B';
						}
					}
					if (($dom[$key]['value'] == 'table')) {
						$dom[$key]['rows'] = 0; // number of rows
						$dom[$key]['trids'] = array(); // IDs of TR elements
						$dom[$key]['thead'] = ''; // table header rows
					}
					if (($dom[$key]['value'] == 'tr')) {
						$dom[$key]['cols'] = 0;
						if ($thead) {
							$dom[$key]['thead'] = true;
							// rows on thead block are printed as a separate table
						} else {
							$dom[$key]['thead'] = false;
							// store the number of rows on table element
							++$dom[($dom[$key]['parent'])]['rows'];
							// store the TR elements IDs on table element
							array_push($dom[($dom[$key]['parent'])]['trids'], $key);
						}
					}
					if (($dom[$key]['value'] == 'th') OR ($dom[$key]['value'] == 'td')) {
						if (isset($dom[$key]['attribute']['colspan'])) {
							$colspan = intval($dom[$key]['attribute']['colspan']);
						} else {
							$colspan = 1;
						}
						$dom[$key]['attribute']['colspan'] = $colspan;
						$dom[($dom[$key]['parent'])]['cols'] += $colspan;
					}
					// text direction
					if (isset($dom[$key]['attribute']['dir'])) {
						$dom[$key]['dir'] = $dom[$key]['attribute']['dir'];
					}
					// set foreground color attribute
					if (isset($dom[$key]['attribute']['color']) AND (!TCPDF_STATIC::empty_string($dom[$key]['attribute']['color']))) {
						$dom[$key]['fgcolor'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['attribute']['color'], $this->spot_colors);
					} elseif (!isset($dom[$key]['style']['color']) AND ($dom[$key]['value'] == 'a')) {
						$dom[$key]['fgcolor'] = $this->htmlLinkColorArray;
					}
					// set background color attribute
					if (isset($dom[$key]['attribute']['bgcolor']) AND (!TCPDF_STATIC::empty_string($dom[$key]['attribute']['bgcolor']))) {
						$dom[$key]['bgcolor'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['attribute']['bgcolor'], $this->spot_colors);
					}
					// set stroke color attribute
					if (isset($dom[$key]['attribute']['strokecolor']) AND (!TCPDF_STATIC::empty_string($dom[$key]['attribute']['strokecolor']))) {
						$dom[$key]['strokecolor'] = TCPDF_COLORS::convertHTMLColorToDec($dom[$key]['attribute']['strokecolor'], $this->spot_colors);
					}
					// check for width attribute
					if (isset($dom[$key]['attribute']['width'])) {
						$dom[$key]['width'] = $dom[$key]['attribute']['width'];
					}
					// check for height attribute
					if (isset($dom[$key]['attribute']['height'])) {
						$dom[$key]['height'] = $dom[$key]['attribute']['height'];
					}
					// check for text alignment
					if (isset($dom[$key]['attribute']['align']) AND (!TCPDF_STATIC::empty_string($dom[$key]['attribute']['align'])) AND ($dom[$key]['value'] !== 'img')) {
						$dom[$key]['align'] = strtoupper($dom[$key]['attribute']['align'][0]);
					}
					// check for text rendering mode (the following attributes do not exist in HTML)
					if (isset($dom[$key]['attribute']['stroke'])) {
						// font stroke width
						$dom[$key]['stroke'] = $this->getHTMLUnitToUnits($dom[$key]['attribute']['stroke'], $dom[$key]['fontsize'], 'pt', true);
					}
					if (isset($dom[$key]['attribute']['fill'])) {
						// font fill
						if ($dom[$key]['attribute']['fill'] == 'true') {
							$dom[$key]['fill'] = true;
						} else {
							$dom[$key]['fill'] = false;
						}
					}
					if (isset($dom[$key]['attribute']['clip'])) {
						// clipping mode
						if ($dom[$key]['attribute']['clip'] == 'true') {
							$dom[$key]['clip'] = true;
						} else {
							$dom[$key]['clip'] = false;
						}
					}
				} // end opening tag
			} else {
				// text
				$dom[$key]['tag'] = false;
				$dom[$key]['block'] = false;
				$dom[$key]['parent'] = end($level);
				$dom[$key]['dir'] = $dom[$dom[$key]['parent']]['dir'];
				if (!empty($dom[$dom[$key]['parent']]['text-transform'])) {
					// text-transform for unicode requires mb_convert_case (Multibyte String Functions)
					if (function_exists('mb_convert_case')) {
						$ttm = array('capitalize' => MB_CASE_TITLE, 'uppercase' => MB_CASE_UPPER, 'lowercase' => MB_CASE_LOWER);
						if (isset($ttm[$dom[$dom[$key]['parent']]['text-transform']])) {
							$element = mb_convert_case($element, $ttm[$dom[$dom[$key]['parent']]['text-transform']], $this->encoding);
						}
					} elseif (!$this->isunicode) {
						switch ($dom[$dom[$key]['parent']]['text-transform']) {
							case 'capitalize': {
								$element = ucwords(strtolower($element));
								break;
							}
							case 'uppercase': {
								$element = strtoupper($element);
								break;
							}
							case 'lowercase': {
								$element = strtolower($element);
								break;
							}
						}
					}
				}
				$dom[$key]['value'] = stripslashes($this->unhtmlentities($element));
			}
			++$elkey;
			++$key;
		}
		return $dom;
	}

	/**
	 * Returns the string used to find spaces
	 * @return string
	 * @protected
	 * @author Nicola Asuni
	 * @since 4.8.024 (2010-01-15)
	 */
	protected function getSpaceString() {
		$spacestr = chr(32);
		if ($this->isUnicodeFont()) {
			$spacestr = chr(0).chr(32);
		}
		return $spacestr;
	}

	/**
	 * Return an hash code used to ensure that the serialized data has been generated by this TCPDF instance.
	 * @param $data (string) serialized data
	 * @return string
	 * @public static
	 */
	protected function getHashForTCPDFtagParams($data) {
		return md5(strlen($data).$this->file_id.$data);
	}

	/**
	 * Serialize an array of parameters to be used with TCPDF tag in HTML code.
	 * @param $data (array) parameters array
	 * @return string containing serialized data
	 * @public static
	 */
	public function serializeTCPDFtagParameters($data) {
		$encoded = urlencode(json_encode($data));
		return $this->getHashForTCPDFtagParams($encoded).$encoded;
	}

	/**
	 * Unserialize parameters to be used with TCPDF tag in HTML code.
	 * @param $data (string) serialized data
	 * @return array containing unserialized data
	 * @protected static
	 */
	protected function unserializeTCPDFtagParameters($data) {
		$hash = substr($data, 0, 32);
		$encoded = substr($data, 32);
		if ($hash != $this->getHashForTCPDFtagParams($encoded)) {
			$this->Error('Invalid parameters');
		}
		return json_decode(urldecode($encoded), true);
	}

	/**
	 * Prints a cell (rectangular area) with optional borders, background color and html text string.
	 * The upper-left corner of the cell corresponds to the current position. After the call, the current position moves to the right or to the next line.<br />
	 * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
	 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
	 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
	 * NOTE: all the HTML attributes must be enclosed in double-quote.
	 * @param $w (float) Cell width. If 0, the cell extends up to the right margin.
	 * @param $h (float) Cell minimum height. The cell extends automatically if needed.
	 * @param $x (float) upper-left corner X coordinate
	 * @param $y (float) upper-left corner Y coordinate
	 * @param $html (string) html text to print. Default value: empty string.
	 * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
	 * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL language)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>
Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
	 * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
	 * @param $reseth (boolean) if true reset the last cell height (default true).
	 * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
	 * @param $autopadding (boolean) if true, uses internal padding and automatically adjust it to account for line width.
	 * @see Multicell(), writeHTML()
	 * @public
	 */
	public function writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=false, $reseth=true, $align='', $autopadding=true) {
		return $this->MultiCell($w, $h, $html, $border, $align, $fill, $ln, $x, $y, $reseth, 0, true, $autopadding, 0, 'T', false);
	}

	/**
	 * Allows to preserve some HTML formatting (limited support).<br />
	 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
	 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
	 * NOTE: all the HTML attributes must be enclosed in double-quote.
	 * @param $html (string) text to display
	 * @param $ln (boolean) if true add a new line after text (default = true)
	 * @param $fill (boolean) Indicates if the background must be painted (true) or transparent (false).
	 * @param $reseth (boolean) if true reset the last cell height (default false).
	 * @param $cell (boolean) if true add the current left (or right for RTL) padding to each Write (default false).
	 * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
	 * @public
	 */
	public function writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='') {
		$gvars = $this->getGraphicVars();
		// store current values
		$prev_cell_margin = $this->cell_margin;
		$prev_cell_padding = $this->cell_padding;
		$prevPage = $this->page;
		$prevlMargin = $this->lMargin;
		$prevrMargin = $this->rMargin;
		$curfontname = $this->FontFamily;
		$curfontstyle = $this->FontStyle;
		$curfontsize = $this->FontSizePt;
		$curfontascent = $this->getFontAscent($curfontname, $curfontstyle, $curfontsize);
		$curfontdescent = $this->getFontDescent($curfontname, $curfontstyle, $curfontsize);
		$curfontstretcing = $this->font_stretching;
		$curfonttracking = $this->font_spacing;
		$this->newline = true;
		$newline = true;
		$startlinepage = $this->page;
		$minstartliney = $this->y;
		$maxbottomliney = 0;
		$startlinex = $this->x;
		$startliney = $this->y;
		$yshift = 0;
		$loop = 0;
		$curpos = 0;
		$this_method_vars = array();
		$undo = false;
		$fontaligned = false;
		$reverse_dir = false; // true when the text direction is reversed
		$this->premode = false;
		if ($this->inxobj) {
			// we are inside an XObject template
			$pask = count($this->xobjects[$this->xobjid]['annotations']);
		} elseif (isset($this->PageAnnots[$this->page])) {
			$pask = count($this->PageAnnots[$this->page]);
		} else {
			$pask = 0;
		}
		if ($this->inxobj) {
			// we are inside an XObject template
			$startlinepos = strlen($this->xobjects[$this->xobjid]['outdata']);
		} elseif (!$this->InFooter) {
			if (isset($this->footerlen[$this->page])) {
				$this->footerpos[$this->page] = $this->pagelen[$this->page] - $this->footerlen[$this->page];
			} else {
				$this->footerpos[$this->page] = $this->pagelen[$this->page];
			}
			$startlinepos = $this->footerpos[$this->page];
		} else {
			// we are inside the footer
			$startlinepos = $this->pagelen[$this->page];
		}
		$lalign = $align;
		$plalign = $align;
		if ($this->rtl) {
			$w = $this->x - $this->lMargin;
		} else {
			$w = $this->w - $this->rMargin - $this->x;
		}
		$w -= ($this->cell_padding['L'] + $this->cell_padding['R']);
		if ($cell) {
			if ($this->rtl) {
				$this->x -= $this->cell_padding['R'];
				$this->lMargin += $this->cell_padding['R'];
			} else {
				$this->x += $this->cell_padding['L'];
				$this->rMargin += $this->cell_padding['L'];
			}
		}
		if ($this->customlistindent >= 0) {
			$this->listindent = $this->customlistindent;
		} else {
			$this->listindent = $this->GetStringWidth('000000');
		}
		$this->listindentlevel = 0;
		// save previous states
		$prev_cell_height_ratio = $this->cell_height_ratio;
		$prev_listnum = $this->listnum;
		$prev_listordered = $this->listordered;
		$prev_listcount = $this->listcount;
		$prev_lispacer = $this->lispacer;
		$this->listnum = 0;
		$this->listordered = array();
		$this->listcount = array();
		$this->lispacer = '';
		if ((TCPDF_STATIC::empty_string($this->lasth)) OR ($reseth)) {
			// reset row height
			$this->resetLastH();
		}
		$dom = $this->getHtmlDomArray($html);
		$maxel = count($dom);
		$key = 0;
		while ($key < $maxel) {
			if ($dom[$key]['tag'] AND $dom[$key]['opening'] AND $dom[$key]['hide']) {
				// store the node key
				$hidden_node_key = $key;
				if ($dom[$key]['self']) {
					// skip just this self-closing tag
					++$key;
				} else {
					// skip this and all children tags
					while (($key < $maxel) AND (!$dom[$key]['tag'] OR $dom[$key]['opening'] OR ($dom[$key]['parent'] != $hidden_node_key))) {
						// skip hidden objects
						++$key;
					}
					++$key;
				}
			}
			if ($dom[$key]['tag'] AND isset($dom[$key]['attribute']['pagebreak'])) {
				// check for pagebreak
				if (($dom[$key]['attribute']['pagebreak'] == 'true') OR ($dom[$key]['attribute']['pagebreak'] == 'left') OR ($dom[$key]['attribute']['pagebreak'] == 'right')) {
					// add a page (or trig AcceptPageBreak() for multicolumn mode)
					$this->checkPageBreak($this->PageBreakTrigger + 1);
					$this->htmlvspace = ($this->PageBreakTrigger + 1);
				}
				if ((($dom[$key]['attribute']['pagebreak'] == 'left') AND (((!$this->rtl) AND (($this->page % 2) == 0)) OR (($this->rtl) AND (($this->page % 2) != 0))))
					OR (($dom[$key]['attribute']['pagebreak'] == 'right') AND (((!$this->rtl) AND (($this->page % 2) != 0)) OR (($this->rtl) AND (($this->page % 2) == 0))))) {
					// add a page (or trig AcceptPageBreak() for multicolumn mode)
					$this->checkPageBreak($this->PageBreakTrigger + 1);
					$this->htmlvspace = ($this->PageBreakTrigger + 1);
				}
			}
			if ($dom[$key]['tag'] AND $dom[$key]['opening'] AND isset($dom[$key]['attribute']['nobr']) AND ($dom[$key]['attribute']['nobr'] == 'true')) {
				if (isset($dom[($dom[$key]['parent'])]['attribute']['nobr']) AND ($dom[($dom[$key]['parent'])]['attribute']['nobr'] == 'true')) {
					$dom[$key]['attribute']['nobr'] = false;
				} else {
					// store current object
					$this->startTransaction();
					// save this method vars
					$this_method_vars['html'] = $html;
					$this_method_vars['ln'] = $ln;
					$this_method_vars['fill'] = $fill;
					$this_method_vars['reseth'] = $reseth;
					$this_method_vars['cell'] = $cell;
					$this_method_vars['align'] = $align;
					$this_method_vars['gvars'] = $gvars;
					$this_method_vars['prevPage'] = $prevPage;
					$this_method_vars['prev_cell_margin'] = $prev_cell_margin;
					$this_method_vars['prev_cell_padding'] = $prev_cell_padding;
					$this_method_vars['prevlMargin'] = $prevlMargin;
					$this_method_vars['prevrMargin'] = $prevrMargin;
					$this_method_vars['curfontname'] = $curfontname;
					$this_method_vars['curfontstyle'] = $curfontstyle;
					$this_method_vars['curfontsize'] = $curfontsize;
					$this_method_vars['curfontascent'] = $curfontascent;
					$this_method_vars['curfontdescent'] = $curfontdescent;
					$this_method_vars['curfontstretcing'] = $curfontstretcing;
					$this_method_vars['curfonttracking'] = $curfonttracking;
					$this_method_vars['minstartliney'] = $minstartliney;
					$this_method_vars['maxbottomliney'] = $maxbottomliney;
					$this_method_vars['yshift'] = $yshift;
					$this_method_vars['startlinepage'] = $startlinepage;
					$this_method_vars['startlinepos'] = $startlinepos;
					$this_method_vars['startlinex'] = $startlinex;
					$this_method_vars['startliney'] = $startliney;
					$this_method_vars['newline'] = $newline;
					$this_method_vars['loop'] = $loop;
					$this_method_vars['curpos'] = $curpos;
					$this_method_vars['pask'] = $pask;
					$this_method_vars['lalign'] = $lalign;
					$this_method_vars['plalign'] = $plalign;
					$this_method_vars['w'] = $w;
					$this_method_vars['prev_cell_height_ratio'] = $prev_cell_height_ratio;
					$this_method_vars['prev_listnum'] = $prev_listnum;
					$this_method_vars['prev_listordered'] = $prev_listordered;
					$this_method_vars['prev_listcount'] = $prev_listcount;
					$this_method_vars['prev_lispacer'] = $prev_lispacer;
					$this_method_vars['fontaligned'] = $fontaligned;
					$this_method_vars['key'] = $key;
					$this_method_vars['dom'] = $dom;
				}
			}
			// print THEAD block
			if (($dom[$key]['value'] == 'tr') AND isset($dom[$key]['thead']) AND $dom[$key]['thead']) {
				if (isset($dom[$key]['parent']) AND isset($dom[$dom[$key]['parent']]['thead']) AND !TCPDF_STATIC::empty_string($dom[$dom[$key]['parent']]['thead'])) {
					$this->inthead = true;
					// print table header (thead)
					$this->writeHTML($this->thead, false, false, false, false, '');
					// check if we are on a new page or on a new column
					if (($this->y < $this->start_transaction_y) OR ($this->checkPageBreak($this->lasth, '', false))) {
						// we are on a new page or on a new column and the total object height is less than the available vertical space.
						// restore previous object
						$this->rollbackTransaction(true);
						// restore previous values
						foreach ($this_method_vars as $vkey => $vval) {
							$$vkey = $vval;
						}
						// disable table header
						$tmp_thead = $this->thead;
						$this->thead = '';
						// add a page (or trig AcceptPageBreak() for multicolumn mode)
						$pre_y = $this->y;
						if ((!$this->checkPageBreak($this->PageBreakTrigger + 1)) AND ($this->y < $pre_y)) {
							// fix for multicolumn mode
							$startliney = $this->y;
						}
						$this->start_transaction_page = $this->page;
						$this->start_transaction_y = $this->y;
						// restore table header
						$this->thead = $tmp_thead;
						// fix table border properties
						if (isset($dom[$dom[$key]['parent']]['attribute']['cellspacing'])) {
							$tmp_cellspacing = $this->getHTMLUnitToUnits($dom[$dom[$key]['parent']]['attribute']['cellspacing'], 1, 'px');
						} elseif (isset($dom[$dom[$key]['parent']]['border-spacing'])) {
							$tmp_cellspacing = $dom[$dom[$key]['parent']]['border-spacing']['V'];
						} else {
							$tmp_cellspacing = 0;
						}
						$dom[$dom[$key]['parent']]['borderposition']['page'] = $this->page;
						$dom[$dom[$key]['parent']]['borderposition']['column'] = $this->current_column;
						$dom[$dom[$key]['parent']]['borderposition']['y'] = $this->y + $tmp_cellspacing;
						$xoffset = ($this->x - $dom[$dom[$key]['parent']]['borderposition']['x']);
						$dom[$dom[$key]['parent']]['borderposition']['x'] += $xoffset;
						$dom[$dom[$key]['parent']]['borderposition']['xmax'] += $xoffset;
						// print table header (thead)
						$this->writeHTML($this->thead, false, false, false, false, '');
					}
				}
				// move $key index forward to skip THEAD block
				while ( ($key < $maxel) AND (!(
					($dom[$key]['tag'] AND $dom[$key]['opening'] AND ($dom[$key]['value'] == 'tr') AND (!isset($dom[$key]['thead']) OR !$dom[$key]['thead']))
					OR ($dom[$key]['tag'] AND (!$dom[$key]['opening']) AND ($dom[$key]['value'] == 'table'))) )) {
					++$key;
				}
			}
			if ($dom[$key]['tag'] OR ($key == 0)) {
				if ((($dom[$key]['value'] == 'table') OR ($dom[$key]['value'] == 'tr')) AND (isset($dom[$key]['align']))) {
					$dom[$key]['align'] = ($this->rtl) ? 'R' : 'L';
				}
				// vertically align image in line
				if ((!$this->newline) AND ($dom[$key]['value'] == 'img') AND (isset($dom[$key]['height'])) AND ($dom[$key]['height'] > 0)) {
					// get image height
					$imgh = $this->getHTMLUnitToUnits($dom[$key]['height'], ($dom[$key]['fontsize'] / $this->k), 'px');
					$autolinebreak = false;
					if (!empty($dom[$key]['width'])) {
						$imgw = $this->getHTMLUnitToUnits($dom[$key]['width'], ($dom[$key]['fontsize'] / $this->k), 'px', false);
						if (($imgw <= ($this->w - $this->lMargin - $this->rMargin - $this->cell_padding['L'] - $this->cell_padding['R']))
							AND ((($this->rtl) AND (($this->x - $imgw) < ($this->lMargin + $this->cell_padding['L'])))
							OR ((!$this->rtl) AND (($this->x + $imgw) > ($this->w - $this->rMargin - $this->cell_padding['R']))))) {
							// add automatic line break
							$autolinebreak = true;
							$this->Ln('', $cell);
							if ((!$dom[($key-1)]['tag']) AND ($dom[($key-1)]['value'] == ' ')) {
								// go back to evaluate this line break
								--$key;
							}
						}
					}
					if (!$autolinebreak) {
						if ($this->inPageBody()) {
							$pre_y = $this->y;
							// check for page break
							if ((!$this->checkPageBreak($imgh)) AND ($this->y < $pre_y)) {
								// fix for multicolumn mode
								$startliney = $this->y;
							}
						}
						if ($this->page > $startlinepage) {
							// fix line splitted over two pages
							if (isset($this->footerlen[$startlinepage])) {
								$curpos = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
							}
							// line to be moved one page forward
							$pagebuff = $this->getPageBuffer($startlinepage);
							$linebeg = substr($pagebuff, $startlinepos, ($curpos - $startlinepos));
							$tstart = substr($pagebuff, 0, $startlinepos);
							$tend = substr($this->getPageBuffer($startlinepage), $curpos);
							// remove line from previous page
							$this->setPageBuffer($startlinepage, $tstart.''.$tend);
							$pagebuff = $this->getPageBuffer($this->page);
							$tstart = substr($pagebuff, 0, $this->cntmrk[$this->page]);
							$tend = substr($pagebuff, $this->cntmrk[$this->page]);
							// add line start to current page
							$yshift = ($minstartliney - $this->y);
							if ($fontaligned) {
								$yshift += ($curfontsize / $this->k);
							}
							$try = sprintf('1 0 0 1 0 %F cm', ($yshift * $this->k));
							$this->setPageBuffer($this->page, $tstart."\nq\n".$try."\n".$linebeg."\nQ\n".$tend);
							// shift the annotations and links
							if (isset($this->PageAnnots[$this->page])) {
								$next_pask = count($this->PageAnnots[$this->page]);
							} else {
								$next_pask = 0;
							}
							if (isset($this->PageAnnots[$startlinepage])) {
								foreach ($this->PageAnnots[$startlinepage] as $pak => $pac) {
									if ($pak >= $pask) {
										$this->PageAnnots[$this->page][] = $pac;
										unset($this->PageAnnots[$startlinepage][$pak]);
										$npak = count($this->PageAnnots[$this->page]) - 1;
										$this->PageAnnots[$this->page][$npak]['y'] -= $yshift;
									}
								}
							}
							$pask = $next_pask;
							$startlinepos = $this->cntmrk[$this->page];
							$startlinepage = $this->page;
							$startliney = $this->y;
							$this->newline = false;
						}
						$this->y += ($this->getCellHeight($curfontsize / $this->k) - ($curfontdescent * $this->cell_height_ratio) - $imgh);
						$minstartliney = min($this->y, $minstartliney);
						$maxbottomliney = ($startliney + $this->getCellHeight($curfontsize / $this->k));
					}
				} elseif (isset($dom[$key]['fontname']) OR isset($dom[$key]['fontstyle']) OR isset($dom[$key]['fontsize']) OR isset($dom[$key]['line-height'])) {
					// account for different font size
					$pfontname = $curfontname;
					$pfontstyle = $curfontstyle;
					$pfontsize = $curfontsize;
					$fontname = (isset($dom[$key]['fontname']) ? $dom[$key]['fontname'] : $curfontname);
					$fontstyle = (isset($dom[$key]['fontstyle']) ? $dom[$key]['fontstyle'] : $curfontstyle);
					$fontsize = (isset($dom[$key]['fontsize']) ? $dom[$key]['fontsize'] : $curfontsize);
					$fontascent = $this->getFontAscent($fontname, $fontstyle, $fontsize);
					$fontdescent = $this->getFontDescent($fontname, $fontstyle, $fontsize);
					if (($fontname != $curfontname) OR ($fontstyle != $curfontstyle) OR ($fontsize != $curfontsize)
						OR ($this->cell_height_ratio != $dom[$key]['line-height'])
						OR ($dom[$key]['tag'] AND $dom[$key]['opening'] AND ($dom[$key]['value'] == 'li')) ) {
						if (($key < ($maxel - 1)) AND (
								($dom[$key]['tag'] AND $dom[$key]['opening'] AND ($dom[$key]['value'] == 'li'))
								OR ($this->cell_height_ratio != $dom[$key]['line-height'])
								OR (!$this->newline AND is_numeric($fontsize) AND is_numeric($curfontsize)
								AND ($fontsize >= 0) AND ($curfontsize >= 0)
								AND (($fontsize != $curfontsize) OR ($fontstyle != $curfontstyle) OR ($fontname != $curfontname)))
							)) {
							if ($this->page > $startlinepage) {
								// fix lines splitted over two pages
								if (isset($this->footerlen[$startlinepage])) {
									$curpos = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
								}
								// line to be moved one page forward
								$pagebuff = $this->getPageBuffer($startlinepage);
								$linebeg = substr($pagebuff, $startlinepos, ($curpos - $startlinepos));
								$tstart = substr($pagebuff, 0, $startlinepos);
								$tend = substr($this->getPageBuffer($startlinepage), $curpos);
								// remove line start from previous page
								$this->setPageBuffer($startlinepage, $tstart.''.$tend);
								$pagebuff = $this->getPageBuffer($this->page);
								$tstart = substr($pagebuff, 0, $this->cntmrk[$this->page]);
								$tend = substr($pagebuff, $this->cntmrk[$this->page]);
								// add line start to current page
								$yshift = ($minstartliney - $this->y);
								$try = sprintf('1 0 0 1 0 %F cm', ($yshift * $this->k));
								$this->setPageBuffer($this->page, $tstart."\nq\n".$try."\n".$linebeg."\nQ\n".$tend);
								// shift the annotations and links
								if (isset($this->PageAnnots[$this->page])) {
									$next_pask = count($this->PageAnnots[$this->page]);
								} else {
									$next_pask = 0;
								}
								if (isset($this->PageAnnots[$startlinepage])) {
									foreach ($this->PageAnnots[$startlinepage] as $pak => $pac) {
										if ($pak >= $pask) {
											$this->PageAnnots[$this->page][] = $pac;
											unset($this->PageAnnots[$startlinepage][$pak]);
											$npak = count($this->PageAnnots[$this->page]) - 1;
											$this->PageAnnots[$this->page][$npak]['y'] -= $yshift;
										}
									}
								}
								$pask = $next_pask;
								$startlinepos = $this->cntmrk[$this->page];
								$startlinepage = $this->page;
								$startliney = $this->y;
							}
							if (!isset($dom[$key]['line-height'])) {
								$dom[$key]['line-height'] = $this->cell_height_ratio;
							}
							if (!$dom[$key]['block']) {
								if (!(isset($dom[($key + 1)]) AND $dom[($key + 1)]['tag'] AND (!$dom[($key + 1)]['opening']) AND ($dom[($key + 1)]['value'] != 'li') AND $dom[$key]['tag'] AND (!$dom[$key]['opening']))) {
									$this->y += (((($curfontsize * $this->cell_height_ratio) - ($fontsize * $dom[$key]['line-height'])) / $this->k) + $curfontascent - $fontascent - $curfontdescent + $fontdescent) / 2;
								}
								if (($dom[$key]['value'] != 'sup') AND ($dom[$key]['value'] != 'sub')) {
									$current_line_align_data = array($key, $minstartliney, $maxbottomliney);
									if (isset($line_align_data) AND (($line_align_data[0] == ($key - 1)) OR (($line_align_data[0] == ($key - 2)) AND (isset($dom[($key - 1)])) AND (preg_match('/^([\s]+)$/', $dom[($key - 1)]['value']) > 0)))) {
										$minstartliney = min($this->y, $line_align_data[1]);
										$maxbottomliney = max(($this->y + $this->getCellHeight($fontsize / $this->k)), $line_align_data[2]);
									} else {
										$minstartliney = min($this->y, $minstartliney);
										$maxbottomliney = max(($this->y + $this->getCellHeight($fontsize / $this->k)), $maxbottomliney);
									}
									$line_align_data = $current_line_align_data;
								}
							}
							$this->cell_height_ratio = $dom[$key]['line-height'];
							$fontaligned = true;
						}
						$this->SetFont($fontname, $fontstyle, $fontsize);
						// reset row height
						$this->resetLastH();
						$curfontname = $fontname;
						$curfontstyle = $fontstyle;
						$curfontsize = $fontsize;
						$curfontascent = $fontascent;
						$curfontdescent = $fontdescent;
					}
				}
				// set text rendering mode
				$textstroke = isset($dom[$key]['stroke']) ? $dom[$key]['stroke'] : $this->textstrokewidth;
				$textfill = isset($dom[$key]['fill']) ? $dom[$key]['fill'] : (($this->textrendermode % 2) == 0);
				$textclip = isset($dom[$key]['clip']) ? $dom[$key]['clip'] : ($this->textrendermode > 3);
				$this->setTextRenderingMode($textstroke, $textfill, $textclip);
				if (isset($dom[$key]['font-stretch']) AND ($dom[$key]['font-stretch'] !== false)) {
					$this->setFontStretching($dom[$key]['font-stretch']);
				}
				if (isset($dom[$key]['letter-spacing']) AND ($dom[$key]['letter-spacing'] !== false)) {
					$this->setFontSpacing($dom[$key]['letter-spacing']);
				}
				if (($plalign == 'J') AND $dom[$key]['block']) {
					$plalign = '';
				}
				// get current position on page buffer
				$curpos = $this->pagelen[$startlinepage];
				if (isset($dom[$key]['bgcolor']) AND ($dom[$key]['bgcolor'] !== false)) {
					$this->SetFillColorArray($dom[$key]['bgcolor']);
					$wfill = true;
				} else {
					$wfill = $fill | false;
				}
				if (isset($dom[$key]['fgcolor']) AND ($dom[$key]['fgcolor'] !== false)) {
					$this->SetTextColorArray($dom[$key]['fgcolor']);
				}
				if (isset($dom[$key]['strokecolor']) AND ($dom[$key]['strokecolor'] !== false)) {
					$this->SetDrawColorArray($dom[$key]['strokecolor']);
				}
				if (isset($dom[$key]['align'])) {
					$lalign = $dom[$key]['align'];
				}
				if (TCPDF_STATIC::empty_string($lalign)) {
					$lalign = $align;
				}
			}
			// align lines
			if ($this->newline AND (strlen($dom[$key]['value']) > 0) AND ($dom[$key]['value'] != 'td') AND ($dom[$key]['value'] != 'th')) {
				$newline = true;
				$fontaligned = false;
				// we are at the beginning of a new line
				if (isset($startlinex)) {
					$yshift = ($minstartliney - $startliney);
					if (($yshift > 0) OR ($this->page > $startlinepage)) {
						$yshift = 0;
					}
					$t_x = 0;
					// the last line must be shifted to be aligned as requested
					$linew = abs($this->endlinex - $startlinex);
					if ($this->inxobj) {
						// we are inside an XObject template
						$pstart = substr($this->xobjects[$this->xobjid]['outdata'], 0, $startlinepos);
						if (isset($opentagpos)) {
							$midpos = $opentagpos;
						} else {
							$midpos = 0;
						}
						if ($midpos > 0) {
							$pmid = substr($this->xobjects[$this->xobjid]['outdata'], $startlinepos, ($midpos - $startlinepos));
							$pend = substr($this->xobjects[$this->xobjid]['outdata'], $midpos);
						} else {
							$pmid = substr($this->xobjects[$this->xobjid]['outdata'], $startlinepos);
							$pend = '';
						}
					} else {
						$pstart = substr($this->getPageBuffer($startlinepage), 0, $startlinepos);
						if (isset($opentagpos) AND isset($this->footerlen[$startlinepage]) AND (!$this->InFooter)) {
							$this->footerpos[$startlinepage] = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
							$midpos = min($opentagpos, $this->footerpos[$startlinepage]);
						} elseif (isset($opentagpos)) {
							$midpos = $opentagpos;
						} elseif (isset($this->footerlen[$startlinepage]) AND (!$this->InFooter)) {
							$this->footerpos[$startlinepage] = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
							$midpos = $this->footerpos[$startlinepage];
						} else {
							$midpos = 0;
						}
						if ($midpos > 0) {
							$pmid = substr($this->getPageBuffer($startlinepage), $startlinepos, ($midpos - $startlinepos));
							$pend = substr($this->getPageBuffer($startlinepage), $midpos);
						} else {
							$pmid = substr($this->getPageBuffer($startlinepage), $startlinepos);
							$pend = '';
						}
					}
					if ((isset($plalign) AND ((($plalign == 'C') OR ($plalign == 'J') OR (($plalign == 'R') AND (!$this->rtl)) OR (($plalign == 'L') AND ($this->rtl)))))) {
						// calculate shifting amount
						$tw = $w;
						if (($plalign == 'J') AND $this->isRTLTextDir() AND ($this->num_columns > 1)) {
							$tw += $this->cell_padding['R'];
						}
						if ($this->lMargin != $prevlMargin) {
							$tw += ($prevlMargin - $this->lMargin);
						}
						if ($this->rMargin != $prevrMargin) {
							$tw += ($prevrMargin - $this->rMargin);
						}
						$one_space_width = $this->GetStringWidth(chr(32));
						$no = 0; // number of spaces on a line contained on a single block
						if ($this->isRTLTextDir()) { // RTL
							// remove left space if exist
							$pos1 = TCPDF_STATIC::revstrpos($pmid, '[(');
							if ($pos1 > 0) {
								$pos1 = intval($pos1);
								if ($this->isUnicodeFont()) {
									$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, '[('.chr(0).chr(32)));
									$spacelen = 2;
								} else {
									$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, '[('.chr(32)));
									$spacelen = 1;
								}
								if ($pos1 == $pos2) {
									$pmid = substr($pmid, 0, ($pos1 + 2)).substr($pmid, ($pos1 + 2 + $spacelen));
									if (substr($pmid, $pos1, 4) == '[()]') {
										$linew -= $one_space_width;
									} elseif ($pos1 == strpos($pmid, '[(')) {
										$no = 1;
									}
								}
							}
						} else { // LTR
							// remove right space if exist
							$pos1 = TCPDF_STATIC::revstrpos($pmid, ')]');
							if ($pos1 > 0) {
								$pos1 = intval($pos1);
								if ($this->isUnicodeFont()) {
									$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, chr(0).chr(32).')]')) + 2;
									$spacelen = 2;
								} else {
									$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, chr(32).')]')) + 1;
									$spacelen = 1;
								}
								if ($pos1 == $pos2) {
									$pmid = substr($pmid, 0, ($pos1 - $spacelen)).substr($pmid, $pos1);
									$linew -= $one_space_width;
								}
							}
						}
						$mdiff = ($tw - $linew);
						if ($plalign == 'C') {
							if ($this->rtl) {
								$t_x = -($mdiff / 2);
							} else {
								$t_x = ($mdiff / 2);
							}
						} elseif ($plalign == 'R') {
							// right alignment on LTR document
							$t_x = $mdiff;
						} elseif ($plalign == 'L') {
							// left alignment on RTL document
							$t_x = -$mdiff;
						} elseif (($plalign == 'J') AND ($plalign == $lalign)) {
							// Justification
							if ($this->isRTLTextDir()) {
								// align text on the left
								$t_x = -$mdiff;
							}
							$ns = 0; // number of spaces
							$pmidtemp = $pmid;
							// escape special characters
							$pmidtemp = preg_replace('/[\\\][\(]/x', '\\#!#OP#!#', $pmidtemp);
							$pmidtemp = preg_replace('/[\\\][\)]/x', '\\#!#CP#!#', $pmidtemp);
							// search spaces
							if (preg_match_all('/\[\(([^\)]*)\)\]/x', $pmidtemp, $lnstring, PREG_PATTERN_ORDER)) {
								$spacestr = $this->getSpaceString();
								$maxkk = count($lnstring[1]) - 1;
								for ($kk=0; $kk <= $maxkk; ++$kk) {
									// restore special characters
									$lnstring[1][$kk] = str_replace('#!#OP#!#', '(', $lnstring[1][$kk]);
									$lnstring[1][$kk] = str_replace('#!#CP#!#', ')', $lnstring[1][$kk]);
									// store number of spaces on the strings
									$lnstring[2][$kk] = substr_count($lnstring[1][$kk], $spacestr);
									// count total spaces on line
									$ns += $lnstring[2][$kk];
									$lnstring[3][$kk] = $ns;
								}
								if ($ns == 0) {
									$ns = 1;
								}
								// calculate additional space to add to each existing space
								$spacewidth = ($mdiff / ($ns - $no)) * $this->k;
								if ($this->FontSize <= 0) {
									$this->FontSize = 1;
								}
								$spacewidthu = -1000 * ($mdiff + (($ns + $no) * $one_space_width)) / $ns / $this->FontSize;
								if ($this->font_spacing != 0) {
									// fixed spacing mode
									$osw = -1000 * $this->font_spacing / $this->FontSize;
									$spacewidthu += $osw;
								}
								$nsmax = $ns;
								$ns = 0;
								reset($lnstring);
								$offset = 0;
								$strcount = 0;
								$prev_epsposbeg = 0;
								$textpos = 0;
								if ($this->isRTLTextDir()) {
									$textpos = $this->wPt;
								}
								while (preg_match('/([0-9\.\+\-]*)[\s](Td|cm|m|l|c|re)[\s]/x', $pmid, $strpiece, PREG_OFFSET_CAPTURE, $offset) == 1) {
									// check if we are inside a string section '[( ... )]'
									$stroffset = strpos($pmid, '[(', $offset);
									if (($stroffset !== false) AND ($stroffset <= $strpiece[2][1])) {
										// set offset to the end of string section
										$offset = strpos($pmid, ')]', $stroffset);
										while (($offset !== false) AND ($pmid[($offset - 1)] == '\\')) {
											$offset = strpos($pmid, ')]', ($offset + 1));
										}
										if ($offset === false) {
											$this->Error('HTML Justification: malformed PDF code.');
										}
										continue;
									}
									if ($this->isRTLTextDir()) {
										$spacew = ($spacewidth * ($nsmax - $ns));
									} else {
										$spacew = ($spacewidth * $ns);
									}
									$offset = $strpiece[2][1] + strlen($strpiece[2][0]);
									$epsposend = strpos($pmid, $this->epsmarker.'Q', $offset);				
									if ($epsposend !== null) {
										$epsposend += strlen($this->epsmarker.'Q');
										$epsposbeg = strpos($pmid, 'q'.$this->epsmarker, $offset);
										if ($epsposbeg === null) {
											$epsposbeg = strpos($pmid, 'q'.$this->epsmarker, ($prev_epsposbeg - 6));
											$prev_epsposbeg = $epsposbeg;
										}
										if (($epsposbeg > 0) AND ($epsposend > 0) AND ($offset > $epsposbeg) AND ($offset < $epsposend)) {
											// shift EPS images
											$trx = sprintf('1 0 0 1 %F 0 cm', $spacew);
											$pmid_b = substr($pmid, 0, $epsposbeg);
											$pmid_m = substr($pmid, $epsposbeg, ($epsposend - $epsposbeg));
											$pmid_e = substr($pmid, $epsposend);
											$pmid = $pmid_b."\nq\n".$trx."\n".$pmid_m."\nQ\n".$pmid_e;
											$offset = $epsposend;
											continue;
										}
									}
									$currentxpos = 0;
									// shift blocks of code
									switch ($strpiece[2][0]) {
										case 'Td':
										case 'cm':
										case 'm':
										case 'l': {
											// get current X position
											preg_match('/([0-9\.\+\-]*)[\s]('.$strpiece[1][0].')[\s]('.$strpiece[2][0].')([\s]*)/x', $pmid, $xmatches);
											if (!isset($xmatches[1])) {
												break;
											}
											$currentxpos = $xmatches[1];
											$textpos = $currentxpos;
											if (($strcount <= $maxkk) AND ($strpiece[2][0] == 'Td')) {
												$ns = $lnstring[3][$strcount];
												if ($this->isRTLTextDir()) {
													$spacew = ($spacewidth * ($nsmax - $ns));
												}
												++$strcount;
											}
											// justify block
											if (preg_match('/([0-9\.\+\-]*)[\s]('.$strpiece[1][0].')[\s]('.$strpiece[2][0].')([\s]*)/x', $pmid, $pmatch) == 1) {
												$newpmid = sprintf('%F',(floatval($pmatch[1]) + $spacew)).' '.$pmatch[2].' x*#!#*x'.$pmatch[3].$pmatch[4];
												$pmid = str_replace($pmatch[0], $newpmid, $pmid);
												unset($pmatch, $newpmid);
											}
											break;
										}
										case 're': {
											// justify block
											if (!TCPDF_STATIC::empty_string($this->lispacer)) {
												$this->lispacer = '';
												continue;
											}
											preg_match('/([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]('.$strpiece[1][0].')[\s](re)([\s]*)/x', $pmid, $xmatches);
											if (!isset($xmatches[1])) {
												break;
											}
											$currentxpos = $xmatches[1];
											$x_diff = 0;
											$w_diff = 0;
											if ($this->isRTLTextDir()) { // RTL
												if ($currentxpos < $textpos) {
													$x_diff = ($spacewidth * ($nsmax - $lnstring[3][$strcount]));
													$w_diff = ($spacewidth * $lnstring[2][$strcount]);
												} else {
													if ($strcount > 0) {
														$x_diff = ($spacewidth * ($nsmax - $lnstring[3][($strcount - 1)]));
														$w_diff = ($spacewidth * $lnstring[2][($strcount - 1)]);
													}
												}
											} else { // LTR
												if ($currentxpos > $textpos) {
													if ($strcount > 0) {
														$x_diff = ($spacewidth * $lnstring[3][($strcount - 1)]);
													}
													$w_diff = ($spacewidth * $lnstring[2][$strcount]);
												} else {
													if ($strcount > 1) {
														$x_diff = ($spacewidth * $lnstring[3][($strcount - 2)]);
													}
													if ($strcount > 0) {
														$w_diff = ($spacewidth * $lnstring[2][($strcount - 1)]);
													}
												}
											}
											if (preg_match('/('.$xmatches[1].')[\s]('.$xmatches[2].')[\s]('.$xmatches[3].')[\s]('.$strpiece[1][0].')[\s](re)([\s]*)/x', $pmid, $pmatch) == 1) {
												$newx = sprintf('%F',(floatval($pmatch[1]) + $x_diff));
												$neww = sprintf('%F',(floatval($pmatch[3]) + $w_diff));
												$newpmid = $newx.' '.$pmatch[2].' '.$neww.' '.$pmatch[4].' x*#!#*x'.$pmatch[5].$pmatch[6];
												$pmid = str_replace($pmatch[0], $newpmid, $pmid);
												unset($pmatch, $newpmid, $newx, $neww);
											}
											break;
										}
										case 'c': {
											// get current X position
											preg_match('/([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]('.$strpiece[1][0].')[\s](c)([\s]*)/x', $pmid, $xmatches);
											if (!isset($xmatches[1])) {
												break;
											}
											$currentxpos = $xmatches[1];
											// justify block
											if (preg_match('/('.$xmatches[1].')[\s]('.$xmatches[2].')[\s]('.$xmatches[3].')[\s]('.$xmatches[4].')[\s]('.$xmatches[5].')[\s]('.$strpiece[1][0].')[\s](c)([\s]*)/x', $pmid, $pmatch) == 1) {
												$newx1 = sprintf('%F',(floatval($pmatch[1]) + $spacew));
												$newx2 = sprintf('%F',(floatval($pmatch[3]) + $spacew));
												$newx3 = sprintf('%F',(floatval($pmatch[5]) + $spacew));
												$newpmid = $newx1.' '.$pmatch[2].' '.$newx2.' '.$pmatch[4].' '.$newx3.' '.$pmatch[6].' x*#!#*x'.$pmatch[7].$pmatch[8];
												$pmid = str_replace($pmatch[0], $newpmid, $pmid);
												unset($pmatch, $newpmid, $newx1, $newx2, $newx3);
											}
											break;
										}
									}
									// shift the annotations and links
									$cxpos = ($currentxpos / $this->k);
									$lmpos = ($this->lMargin + $this->cell_padding['L'] + $this->feps);
									if ($this->inxobj) {
										// we are inside an XObject template
										foreach ($this->xobjects[$this->xobjid]['annotations'] as $pak => $pac) {
											if (($pac['y'] >= $minstartliney) AND (($pac['x'] * $this->k) >= ($currentxpos - $this->feps)) AND (($pac['x'] * $this->k) <= ($currentxpos + $this->feps))) {
												if ($cxpos > $lmpos) {
													$this->xobjects[$this->xobjid]['annotations'][$pak]['x'] += ($spacew / $this->k);
													$this->xobjects[$this->xobjid]['annotations'][$pak]['w'] += (($spacewidth * $pac['numspaces']) / $this->k);
												} else {
													$this->xobjects[$this->xobjid]['annotations'][$pak]['w'] += (($spacewidth * $pac['numspaces']) / $this->k);
												}
												break;
											}
										}
									} elseif (isset($this->PageAnnots[$this->page])) {
										foreach ($this->PageAnnots[$this->page] as $pak => $pac) {
											if (($pac['y'] >= $minstartliney) AND (($pac['x'] * $this->k) >= ($currentxpos - $this->feps)) AND (($pac['x'] * $this->k) <= ($currentxpos + $this->feps))) {
												if ($cxpos > $lmpos) {
													$this->PageAnnots[$this->page][$pak]['x'] += ($spacew / $this->k);
													$this->PageAnnots[$this->page][$pak]['w'] += (($spacewidth * $pac['numspaces']) / $this->k);
												} else {
													$this->PageAnnots[$this->page][$pak]['w'] += (($spacewidth * $pac['numspaces']) / $this->k);
												}
												break;
											}
										}
									}
								} // end of while
								// remove markers
								$pmid = str_replace('x*#!#*x', '', $pmid);
								if ($this->isUnicodeFont()) {
									// multibyte characters
									$spacew = $spacewidthu;
									if ($this->font_stretching != 100) {
										// word spacing is affected by stretching
										$spacew /= ($this->font_stretching / 100);
									}
									// escape special characters
									$pos = 0;
									$pmid = preg_replace('/[\\\][\(]/x', '\\#!#OP#!#', $pmid);
									$pmid = preg_replace('/[\\\][\)]/x', '\\#!#CP#!#', $pmid);
									if (preg_match_all('/\[\(([^\)]*)\)\]/x', $pmid, $pamatch) > 0) {
										foreach($pamatch[0] as $pk => $pmatch) {
											$replace = $pamatch[1][$pk];
											$replace = str_replace('#!#OP#!#', '(', $replace);
											$replace = str_replace('#!#CP#!#', ')', $replace);
											$newpmid = '[('.str_replace(chr(0).chr(32), ') '.sprintf('%F', $spacew).' (', $replace).')]';
											$pos = strpos($pmid, $pmatch, $pos);
											if ($pos !== FALSE) {
												$pmid = substr_replace($pmid, $newpmid, $pos, strlen($pmatch));
											}
											++$pos;
										}
										unset($pamatch);
									}
									if ($this->inxobj) {
										// we are inside an XObject template
										$this->xobjects[$this->xobjid]['outdata'] = $pstart."\n".$pmid."\n".$pend;
									} else {
										$this->setPageBuffer($startlinepage, $pstart."\n".$pmid."\n".$pend);
									}
									$endlinepos = strlen($pstart."\n".$pmid."\n");
								} else {
									// non-unicode (single-byte characters)
									if ($this->font_stretching != 100) {
										// word spacing (Tw) is affected by stretching
										$spacewidth /= ($this->font_stretching / 100);
									}
									$rs = sprintf('%F Tw', $spacewidth);
									$pmid = preg_replace("/\[\(/x", $rs.' [(', $pmid);
									if ($this->inxobj) {
										// we are inside an XObject template
										$this->xobjects[$this->xobjid]['outdata'] = $pstart."\n".$pmid."\nBT 0 Tw ET\n".$pend;
									} else {
										$this->setPageBuffer($startlinepage, $pstart."\n".$pmid."\nBT 0 Tw ET\n".$pend);
									}
									$endlinepos = strlen($pstart."\n".$pmid."\nBT 0 Tw ET\n");
								}
							}
						} // end of J
					} // end if $startlinex
					if (($t_x != 0) OR ($yshift < 0)) {
						// shift the line
						$trx = sprintf('1 0 0 1 %F %F cm', ($t_x * $this->k), ($yshift * $this->k));
						$pstart .= "\nq\n".$trx."\n".$pmid."\nQ\n";
						$endlinepos = strlen($pstart);
						if ($this->inxobj) {
							// we are inside an XObject template
							$this->xobjects[$this->xobjid]['outdata'] = $pstart.$pend;
							foreach ($this->xobjects[$this->xobjid]['annotations'] as $pak => $pac) {
								if ($pak >= $pask) {
									$this->xobjects[$this->xobjid]['annotations'][$pak]['x'] += $t_x;
									$this->xobjects[$this->xobjid]['annotations'][$pak]['y'] -= $yshift;
								}
							}
						} else {
							$this->setPageBuffer($startlinepage, $pstart.$pend);
							// shift the annotations and links
							if (isset($this->PageAnnots[$this->page])) {
								foreach ($this->PageAnnots[$this->page] as $pak => $pac) {
									if ($pak >= $pask) {
										$this->PageAnnots[$this->page][$pak]['x'] += $t_x;
										$this->PageAnnots[$this->page][$pak]['y'] -= $yshift;
									}
								}
							}
						}
						$this->y -= $yshift;
					}
				}
				$pbrk = $this->checkPageBreak($this->lasth);
				$this->newline = false;
				$startlinex = $this->x;
				$startliney = $this->y;
				if ($dom[$dom[$key]['parent']]['value'] == 'sup') {
					$startliney -= ((0.3 * $this->FontSizePt) / $this->k);
				} elseif ($dom[$dom[$key]['parent']]['value'] == 'sub') {
					$startliney -= (($this->FontSizePt / 0.7) / $this->k);
				} else {
					$minstartliney = $startliney;
					$maxbottomliney = ($this->y + $this->getCellHeight($fontsize / $this->k));
				}
				$startlinepage = $this->page;
				if (isset($endlinepos) AND (!$pbrk)) {
					$startlinepos = $endlinepos;
				} else {
					if ($this->inxobj) {
						// we are inside an XObject template
						$startlinepos = strlen($this->xobjects[$this->xobjid]['outdata']);
					} elseif (!$this->InFooter) {
						if (isset($this->footerlen[$this->page])) {
							$this->footerpos[$this->page] = $this->pagelen[$this->page] - $this->footerlen[$this->page];
						} else {
							$this->footerpos[$this->page] = $this->pagelen[$this->page];
						}
						$startlinepos = $this->footerpos[$this->page];
					} else {
						$startlinepos = $this->pagelen[$this->page];
					}
				}
				unset($endlinepos);
				$plalign = $lalign;
				if (isset($this->PageAnnots[$this->page])) {
					$pask = count($this->PageAnnots[$this->page]);
				} else {
					$pask = 0;
				}
				if (!($dom[$key]['tag'] AND !$dom[$key]['opening'] AND ($dom[$key]['value'] == 'table')
					AND (isset($this->emptypagemrk[$this->page]))
					AND ($this->emptypagemrk[$this->page] == $this->pagelen[$this->page]))) {
					$this->SetFont($fontname, $fontstyle, $fontsize);
					if ($wfill) {
						$this->SetFillColorArray($this->bgcolor);
					}
				}
			} // end newline
			if (isset($opentagpos)) {
				unset($opentagpos);
			}
			if ($dom[$key]['tag']) {
				if ($dom[$key]['opening']) {
					// get text indentation (if any)
					if (isset($dom[$key]['text-indent']) AND $dom[$key]['block']) {
						$this->textindent = $dom[$key]['text-indent'];
						$this->newline = true;
					}
					// table
					if (($dom[$key]['value'] == 'table') AND isset($dom[$key]['cols']) AND ($dom[$key]['cols'] > 0)) {
						// available page width
						if ($this->rtl) {
							$wtmp = $this->x - $this->lMargin;
						} else {
							$wtmp = $this->w - $this->rMargin - $this->x;
						}
						// get cell spacing
						if (isset($dom[$key]['attribute']['cellspacing'])) {
							$clsp = $this->getHTMLUnitToUnits($dom[$key]['attribute']['cellspacing'], 1, 'px');
							$cellspacing = array('H' => $clsp, 'V' => $clsp);
						} elseif (isset($dom[$key]['border-spacing'])) {
							$cellspacing = $dom[$key]['border-spacing'];
						} else {
							$cellspacing = array('H' => 0, 'V' => 0);
						}
						// table width
						if (isset($dom[$key]['width'])) {
							$table_width = $this->getHTMLUnitToUnits($dom[$key]['width'], $wtmp, 'px');
						} else {
							$table_width = $wtmp;
						}
						$table_width -= (2 * $cellspacing['H']);
						if (!$this->inthead) {
							$this->y += $cellspacing['V'];
						}
						if ($this->rtl) {
							$cellspacingx = -$cellspacing['H'];
						} else {
							$cellspacingx = $cellspacing['H'];
						}
						// total table width without cellspaces
						$table_columns_width = ($table_width - ($cellspacing['H'] * ($dom[$key]['cols'] - 1)));
						// minimum column width
						$table_min_column_width = ($table_columns_width / $dom[$key]['cols']);
						// array of custom column widths
						$table_colwidths = array_fill(0, $dom[$key]['cols'], $table_min_column_width);
					}
					// table row
					if ($dom[$key]['value'] == 'tr') {
						// reset column counter
						$colid = 0;
					}
					// table cell
					if (($dom[$key]['value'] == 'td') OR ($dom[$key]['value'] == 'th')) {
						$trid = $dom[$key]['parent'];
						$table_el = $dom[$trid]['parent'];
						if (!isset($dom[$table_el]['cols'])) {
							$dom[$table_el]['cols'] = $dom[$trid]['cols'];
						}
						// store border info
						$tdborder = 0;
						if (isset($dom[$key]['border']) AND !empty($dom[$key]['border'])) {
							$tdborder = $dom[$key]['border'];
						}
						$colspan = intval($dom[$key]['attribute']['colspan']);
						if ($colspan <= 0) {
							$colspan = 1;
						}
						$old_cell_padding = $this->cell_padding;
						if (isset($dom[($dom[$trid]['parent'])]['attribute']['cellpadding'])) {
							$crclpd = $this->getHTMLUnitToUnits($dom[($dom[$trid]['parent'])]['attribute']['cellpadding'], 1, 'px');
							$current_cell_padding = array('L' => $crclpd, 'T' => $crclpd, 'R' => $crclpd, 'B' => $crclpd);
						} elseif (isset($dom[($dom[$trid]['parent'])]['padding'])) {
							$current_cell_padding = $dom[($dom[$trid]['parent'])]['padding'];
						} else {
							$current_cell_padding = array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0);
						}
						$this->cell_padding = $current_cell_padding;
						if (isset($dom[$key]['height'])) {
							// minimum cell height
							$cellh = $this->getHTMLUnitToUnits($dom[$key]['height'], 0, 'px');
						} else {
							$cellh = 0;
						}
						if (isset($dom[$key]['content'])) {
							$cell_content = $dom[$key]['content'];
						} else {
							$cell_content = '&nbsp;';
						}
						$tagtype = $dom[$key]['value'];
						$parentid = $key;
						while (($key < $maxel) AND (!(($dom[$key]['tag']) AND (!$dom[$key]['opening']) AND ($dom[$key]['value'] == $tagtype) AND ($dom[$key]['parent'] == $parentid)))) {
							// move $key index forward
							++$key;
						}
						if (!isset($dom[$trid]['startpage'])) {
							$dom[$trid]['startpage'] = $this->page;
						} else {
							$this->setPage($dom[$trid]['startpage']);
						}
						if (!isset($dom[$trid]['startcolumn'])) {
							$dom[$trid]['startcolumn'] = $this->current_column;
						} elseif ($this->current_column != $dom[$trid]['startcolumn']) {
							$tmpx = $this->x;
							$this->selectColumn($dom[$trid]['startcolumn']);
							$this->x = $tmpx;
						}
						if (!isset($dom[$trid]['starty'])) {
							$dom[$trid]['starty'] = $this->y;
						} else {
							$this->y = $dom[$trid]['starty'];
						}
						if (!isset($dom[$trid]['startx'])) {
							$dom[$trid]['startx'] = $this->x;
							$this->x += $cellspacingx;
						} else {
							$this->x += ($cellspacingx / 2);
						}
						if (isset($dom[$parentid]['attribute']['rowspan'])) {
							$rowspan = intval($dom[$parentid]['attribute']['rowspan']);
						} else {
							$rowspan = 1;
						}
						// skip row-spanned cells started on the previous rows
						if (isset($dom[$table_el]['rowspans'])) {
							$rsk = 0;
							$rskmax = count($dom[$table_el]['rowspans']);
							while ($rsk < $rskmax) {
								$trwsp = $dom[$table_el]['rowspans'][$rsk];
								$rsstartx = $trwsp['startx'];
								$rsendx = $trwsp['endx'];
								// account for margin changes
								if ($trwsp['startpage'] < $this->page) {
									if (($this->rtl) AND ($this->pagedim[$this->page]['orm'] != $this->pagedim[$trwsp['startpage']]['orm'])) {
										$dl = ($this->pagedim[$this->page]['orm'] - $this->pagedim[$trwsp['startpage']]['orm']);
										$rsstartx -= $dl;
										$rsendx -= $dl;
									} elseif ((!$this->rtl) AND ($this->pagedim[$this->page]['olm'] != $this->pagedim[$trwsp['startpage']]['olm'])) {
										$dl = ($this->pagedim[$this->page]['olm'] - $this->pagedim[$trwsp['startpage']]['olm']);
										$rsstartx += $dl;
										$rsendx += $dl;
									}
								}
								if (($trwsp['rowspan'] > 0)
									AND ($rsstartx > ($this->x - $cellspacing['H'] - $current_cell_padding['L'] - $this->feps))
									AND ($rsstartx < ($this->x + $cellspacing['H'] + $current_cell_padding['R'] + $this->feps))
									AND (($trwsp['starty'] < ($this->y - $this->feps)) OR ($trwsp['startpage'] < $this->page) OR ($trwsp['startcolumn'] < $this->current_column))) {
									// set the starting X position of the current cell
									$this->x = $rsendx + $cellspacingx;
									// increment column indicator
									$colid += $trwsp['colspan'];
									if (($trwsp['rowspan'] == 1)
										AND (isset($dom[$trid]['endy']))
										AND (isset($dom[$trid]['endpage']))
										AND (isset($dom[$trid]['endcolumn']))
										AND ($trwsp['endpage'] == $dom[$trid]['endpage'])
										AND ($trwsp['endcolumn'] == $dom[$trid]['endcolumn'])) {
										// set ending Y position for row
										$dom[$table_el]['rowspans'][$rsk]['endy'] = max($dom[$trid]['endy'], $trwsp['endy']);
										$dom[$trid]['endy'] = $dom[$table_el]['rowspans'][$rsk]['endy'];
									}
									$rsk = 0;
								} else {
									++$rsk;
								}
							}
						}
						if (isset($dom[$parentid]['width'])) {
							// user specified width
							$cellw = $this->getHTMLUnitToUnits($dom[$parentid]['width'], $table_columns_width, 'px');
							$tmpcw = ($cellw / $colspan);
							for ($i = 0; $i < $colspan; ++$i) {
								$table_colwidths[($colid + $i)] = $tmpcw;
							}
						} else {
							// inherit column width
							$cellw = 0;
							for ($i = 0; $i < $colspan; ++$i) {
								$cellw += (isset($table_colwidths[($colid + $i)]) ? $table_colwidths[($colid + $i)] : 0);
							}
						}
						$cellw += (($colspan - 1) * $cellspacing['H']);
						// increment column indicator
						$colid += $colspan;
						// add rowspan information to table element
						if ($rowspan > 1) {
							$trsid = array_push($dom[$table_el]['rowspans'], array('trid' => $trid, 'rowspan' => $rowspan, 'mrowspan' => $rowspan, 'colspan' => $colspan, 'startpage' => $this->page, 'startcolumn' => $this->current_column, 'startx' => $this->x, 'starty' => $this->y));
						}
						$cellid = array_push($dom[$trid]['cellpos'], array('startx' => $this->x));
						if ($rowspan > 1) {
							$dom[$trid]['cellpos'][($cellid - 1)]['rowspanid'] = ($trsid - 1);
						}
						// push background colors
						if (isset($dom[$parentid]['bgcolor']) AND ($dom[$parentid]['bgcolor'] !== false)) {
							$dom[$trid]['cellpos'][($cellid - 1)]['bgcolor'] = $dom[$parentid]['bgcolor'];
						}
						// store border info
						if (isset($tdborder) AND !empty($tdborder)) {
							$dom[$trid]['cellpos'][($cellid - 1)]['border'] = $tdborder;
						}
						$prevLastH = $this->lasth;
						// store some info for multicolumn mode
						if ($this->rtl) {
							$this->colxshift['x'] = $this->w - $this->x - $this->rMargin;
						} else {
							$this->colxshift['x'] = $this->x - $this->lMargin;
						}
						$this->colxshift['s'] = $cellspacing;
						$this->colxshift['p'] = $current_cell_padding;
						// ****** write the cell content ******
						$this->MultiCell($cellw, $cellh, $cell_content, false, $lalign, false, 2, '', '', true, 0, true, true, 0, 'T', false);
						// restore some values
						$this->colxshift = array('x' => 0, 's' => array('H' => 0, 'V' => 0), 'p' => array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0));
						$this->lasth = $prevLastH;
						$this->cell_padding = $old_cell_padding;
						$dom[$trid]['cellpos'][($cellid - 1)]['endx'] = $this->x;
						// update the end of row position
						if ($rowspan <= 1) {
							if (isset($dom[$trid]['endy'])) {
								if (($this->page == $dom[$trid]['endpage']) AND ($this->current_column == $dom[$trid]['endcolumn'])) {
									$dom[$trid]['endy'] = max($this->y, $dom[$trid]['endy']);
								} elseif (($this->page > $dom[$trid]['endpage']) OR ($this->current_column > $dom[$trid]['endcolumn'])) {
									$dom[$trid]['endy'] = $this->y;
								}
							} else {
								$dom[$trid]['endy'] = $this->y;
							}
							if (isset($dom[$trid]['endpage'])) {
								$dom[$trid]['endpage'] = max($this->page, $dom[$trid]['endpage']);
							} else {
								$dom[$trid]['endpage'] = $this->page;
							}
							if (isset($dom[$trid]['endcolumn'])) {
								$dom[$trid]['endcolumn'] = max($this->current_column, $dom[$trid]['endcolumn']);
							} else {
								$dom[$trid]['endcolumn'] = $this->current_column;
							}
						} else {
							// account for row-spanned cells
							$dom[$table_el]['rowspans'][($trsid - 1)]['endx'] = $this->x;
							$dom[$table_el]['rowspans'][($trsid - 1)]['endy'] = $this->y;
							$dom[$table_el]['rowspans'][($trsid - 1)]['endpage'] = $this->page;
							$dom[$table_el]['rowspans'][($trsid - 1)]['endcolumn'] = $this->current_column;
						}
						if (isset($dom[$table_el]['rowspans'])) {
							// update endy and endpage on rowspanned cells
							foreach ($dom[$table_el]['rowspans'] as $k => $trwsp) {
								if ($trwsp['rowspan'] > 0) {
									if (isset($dom[$trid]['endpage'])) {
										if (($trwsp['endpage'] == $dom[$trid]['endpage']) AND ($trwsp['endcolumn'] == $dom[$trid]['endcolumn'])) {
											$dom[$table_el]['rowspans'][$k]['endy'] = max($dom[$trid]['endy'], $trwsp['endy']);
										} elseif (($trwsp['endpage'] < $dom[$trid]['endpage']) OR ($trwsp['endcolumn'] < $dom[$trid]['endcolumn'])) {
											$dom[$table_el]['rowspans'][$k]['endy'] = $dom[$trid]['endy'];
											$dom[$table_el]['rowspans'][$k]['endpage'] = $dom[$trid]['endpage'];
											$dom[$table_el]['rowspans'][$k]['endcolumn'] = $dom[$trid]['endcolumn'];
										} else {
											$dom[$trid]['endy'] = $this->pagedim[$dom[$trid]['endpage']]['hk'] - $this->pagedim[$dom[$trid]['endpage']]['bm'];
										}
									}
								}
							}
						}
						$this->x += ($cellspacingx / 2);
					} else {
						// opening tag (or self-closing tag)
						if (!isset($opentagpos)) {
							if ($this->inxobj) {
								// we are inside an XObject template
								$opentagpos = strlen($this->xobjects[$this->xobjid]['outdata']);
							} elseif (!$this->InFooter) {
								if (isset($this->footerlen[$this->page])) {
									$this->footerpos[$this->page] = $this->pagelen[$this->page] - $this->footerlen[$this->page];
								} else {
									$this->footerpos[$this->page] = $this->pagelen[$this->page];
								}
								$opentagpos = $this->footerpos[$this->page];
							}
						}
						$dom = $this->openHTMLTagHandler($dom, $key, $cell);
					}
				} else { // closing tag
					$prev_numpages = $this->numpages;
					$old_bordermrk = $this->bordermrk[$this->page];
					$dom = $this->closeHTMLTagHandler($dom, $key, $cell, $maxbottomliney);
					if ($this->bordermrk[$this->page] > $old_bordermrk) {
						$startlinepos += ($this->bordermrk[$this->page] - $old_bordermrk);
					}
					if ($prev_numpages > $this->numpages) {
						$startlinepage = $this->page;
					}
				}
			} elseif (strlen($dom[$key]['value']) > 0) {
				// print list-item
				if (!TCPDF_STATIC::empty_string($this->lispacer) AND ($this->lispacer != '^')) {
					$this->SetFont($pfontname, $pfontstyle, $pfontsize);
					$this->resetLastH();
					$minstartliney = $this->y;
					$maxbottomliney = ($startliney + $this->getCellHeight($this->FontSize));
					if (is_numeric($pfontsize) AND ($pfontsize > 0)) {
						$this->putHtmlListBullet($this->listnum, $this->lispacer, $pfontsize);
					}
					$this->SetFont($curfontname, $curfontstyle, $curfontsize);
					$this->resetLastH();
					if (is_numeric($pfontsize) AND ($pfontsize > 0) AND is_numeric($curfontsize) AND ($curfontsize > 0) AND ($pfontsize != $curfontsize)) {
						$pfontascent = $this->getFontAscent($pfontname, $pfontstyle, $pfontsize);
						$pfontdescent = $this->getFontDescent($pfontname, $pfontstyle, $pfontsize);
						$this->y += ($this->getCellHeight(($pfontsize - $curfontsize) / $this->k) + $pfontascent - $curfontascent - $pfontdescent + $curfontdescent) / 2;
						$minstartliney = min($this->y, $minstartliney);
						$maxbottomliney = max(($this->y + $this->getCellHeight($pfontsize / $this->k)), $maxbottomliney);
					}
				}
				// text
				$this->htmlvspace = 0;
				if ((!$this->premode) AND $this->isRTLTextDir()) {
					// reverse spaces order
					$lsp = ''; // left spaces
					$rsp = ''; // right spaces
					if (preg_match('/^('.$this->re_space['p'].'+)/'.$this->re_space['m'], $dom[$key]['value'], $matches)) {
						$lsp = $matches[1];
					}
					if (preg_match('/('.$this->re_space['p'].'+)$/'.$this->re_space['m'], $dom[$key]['value'], $matches)) {
						$rsp = $matches[1];
					}
					$dom[$key]['value'] = $rsp.$this->stringTrim($dom[$key]['value']).$lsp;
				}
				if ($newline) {
					if (!$this->premode) {
						$prelen = strlen($dom[$key]['value']);
						if ($this->isRTLTextDir()) {
							// right trim except non-breaking space
							$dom[$key]['value'] = $this->stringRightTrim($dom[$key]['value']);
						} else {
							// left trim except non-breaking space
							$dom[$key]['value'] = $this->stringLeftTrim($dom[$key]['value']);
						}
						$postlen = strlen($dom[$key]['value']);
						if (($postlen == 0) AND ($prelen > 0)) {
							$dom[$key]['trimmed_space'] = true;
						}
					}
					$newline = false;
					$firstblock = true;
				} else {
					$firstblock = false;
					// replace empty multiple spaces string with a single space
					$dom[$key]['value'] = preg_replace('/^'.$this->re_space['p'].'+$/'.$this->re_space['m'], chr(32), $dom[$key]['value']);
				}
				$strrest = '';
				if ($this->rtl) {
					$this->x -= $this->textindent;
				} else {
					$this->x += $this->textindent;
				}
				if (!isset($dom[$key]['trimmed_space']) OR !$dom[$key]['trimmed_space']) {
					$strlinelen = $this->GetStringWidth($dom[$key]['value']);
					if (!empty($this->HREF) AND (isset($this->HREF['url']))) {
						// HTML <a> Link
						$hrefcolor = '';
						if (isset($dom[($dom[$key]['parent'])]['fgcolor']) AND ($dom[($dom[$key]['parent'])]['fgcolor'] !== false)) {
							$hrefcolor = $dom[($dom[$key]['parent'])]['fgcolor'];
						}
						$hrefstyle = -1;
						if (isset($dom[($dom[$key]['parent'])]['fontstyle']) AND ($dom[($dom[$key]['parent'])]['fontstyle'] !== false)) {
							$hrefstyle = $dom[($dom[$key]['parent'])]['fontstyle'];
						}
						$strrest = $this->addHtmlLink($this->HREF['url'], $dom[$key]['value'], $wfill, true, $hrefcolor, $hrefstyle, true);
					} else {
						$wadj = 0; // space to leave for block continuity
						if ($this->rtl) {
							$cwa = ($this->x - $this->lMargin);
						} else {
							$cwa = ($this->w - $this->rMargin - $this->x);
						}
						if (($strlinelen < $cwa) AND (isset($dom[($key + 1)])) AND ($dom[($key + 1)]['tag']) AND (!$dom[($key + 1)]['block'])) {
							// check the next text blocks for continuity
							$nkey = ($key + 1);
							$write_block = true;
							$same_textdir = true;
							$tmp_fontname = $this->FontFamily;
							$tmp_fontstyle = $this->FontStyle;
							$tmp_fontsize = $this->FontSizePt;
							while ($write_block AND isset($dom[$nkey])) {
								if ($dom[$nkey]['tag']) {
									if ($dom[$nkey]['block']) {
										// end of block
										$write_block = false;
									}
									$tmp_fontname = isset($dom[$nkey]['fontname']) ? $dom[$nkey]['fontname'] : $this->FontFamily;
									$tmp_fontstyle = isset($dom[$nkey]['fontstyle']) ? $dom[$nkey]['fontstyle'] : $this->FontStyle;
									$tmp_fontsize = isset($dom[$nkey]['fontsize']) ? $dom[$nkey]['fontsize'] : $this->FontSizePt;
									$same_textdir = ($dom[$nkey]['dir'] == $dom[$key]['dir']);
								} else {
									$nextstr = TCPDF_STATIC::pregSplit('/'.$this->re_space['p'].'+/', $this->re_space['m'], $dom[$nkey]['value']);
									if (isset($nextstr[0]) AND $same_textdir) {
										$wadj += $this->GetStringWidth($nextstr[0], $tmp_fontname, $tmp_fontstyle, $tmp_fontsize);
										if (isset($nextstr[1])) {
											$write_block = false;
										}
									}
								}
								++$nkey;
							}
						}
						if (($wadj > 0) AND (($strlinelen + $wadj) >= $cwa)) {
							$wadj = 0;
							$nextstr = TCPDF_STATIC::pregSplit('/'.$this->re_space['p'].'/', $this->re_space['m'], $dom[$key]['value']);
							$numblks = count($nextstr);
							if ($numblks > 1) {
								// try to split on blank spaces
								$wadj = ($cwa - $strlinelen + $this->GetStringWidth($nextstr[($numblks - 1)]));
							} else {
								// set the entire block on new line
								$wadj = $this->GetStringWidth($nextstr[0]);
							}
						}
						// check for reversed text direction
						if (($wadj > 0) AND (($this->rtl AND ($this->tmprtl === 'L')) OR (!$this->rtl AND ($this->tmprtl === 'R')))) {
							// LTR text on RTL direction or RTL text on LTR direction
							$reverse_dir = true;
							$this->rtl = !$this->rtl;
							$revshift = ($strlinelen + $wadj + 0.000001); // add little quantity for rounding problems
							if ($this->rtl) {
								$this->x += $revshift;
							} else {
								$this->x -= $revshift;
							}
							$xws = $this->x;
						}
						// ****** write only until the end of the line and get the rest ******
						$strrest = $this->Write($this->lasth, $dom[$key]['value'], '', $wfill, '', false, 0, true, $firstblock, 0, $wadj);
						// restore default direction
						if ($reverse_dir AND ($wadj == 0)) {
							$this->x = $xws;
							$this->rtl = !$this->rtl;
							$reverse_dir = false;
						}
					}
				}
				$this->textindent = 0;
				if (strlen($strrest) > 0) {
					// store the remaining string on the previous $key position
					$this->newline = true;
					if ($strrest == $dom[$key]['value']) {
						// used to avoid infinite loop
						++$loop;
					} else {
						$loop = 0;
					}
					$dom[$key]['value'] = $strrest;
					if ($cell) {
						if ($this->rtl) {
							$this->x -= $this->cell_padding['R'];
						} else {
							$this->x += $this->cell_padding['L'];
						}
					}
					if ($loop < 3) {
						--$key;
					}
				} else {
					$loop = 0;
					// add the positive font spacing of the last character (if any)
					 if ($this->font_spacing > 0) {
					 	if ($this->rtl) {
							$this->x -= $this->font_spacing;
						} else {
							$this->x += $this->font_spacing;
						}
					}
				}
			}
			++$key;
			if (isset($dom[$key]['tag']) AND $dom[$key]['tag'] AND (!isset($dom[$key]['opening']) OR !$dom[$key]['opening']) AND isset($dom[($dom[$key]['parent'])]['attribute']['nobr']) AND ($dom[($dom[$key]['parent'])]['attribute']['nobr'] == 'true')) {
				// check if we are on a new page or on a new column
				if ((!$undo) AND (($this->y < $this->start_transaction_y) OR (($dom[$key]['value'] == 'tr') AND ($dom[($dom[$key]['parent'])]['endy'] < $this->start_transaction_y)))) {
					// we are on a new page or on a new column and the total object height is less than the available vertical space.
					// restore previous object
					$this->rollbackTransaction(true);
					// restore previous values
					foreach ($this_method_vars as $vkey => $vval) {
						$$vkey = $vval;
					}
					if (!empty($dom[$key]['thead'])) {
						$this->inthead = true;
					}
					// add a page (or trig AcceptPageBreak() for multicolumn mode)
					$pre_y = $this->y;
					if ((!$this->checkPageBreak($this->PageBreakTrigger + 1)) AND ($this->y < $pre_y)) {
						$startliney = $this->y;
					}
					$undo = true; // avoid infinite loop
				} else {
					$undo = false;
				}
			}
		} // end for each $key
		// align the last line
		if (isset($startlinex)) {
			$yshift = ($minstartliney - $startliney);
			if (($yshift > 0) OR ($this->page > $startlinepage)) {
				$yshift = 0;
			}
			$t_x = 0;
			// the last line must be shifted to be aligned as requested
			$linew = abs($this->endlinex - $startlinex);
			if ($this->inxobj) {
				// we are inside an XObject template
				$pstart = substr($this->xobjects[$this->xobjid]['outdata'], 0, $startlinepos);
				if (isset($opentagpos)) {
					$midpos = $opentagpos;
				} else {
					$midpos = 0;
				}
				if ($midpos > 0) {
					$pmid = substr($this->xobjects[$this->xobjid]['outdata'], $startlinepos, ($midpos - $startlinepos));
					$pend = substr($this->xobjects[$this->xobjid]['outdata'], $midpos);
				} else {
					$pmid = substr($this->xobjects[$this->xobjid]['outdata'], $startlinepos);
					$pend = '';
				}
			} else {
				$pstart = substr($this->getPageBuffer($startlinepage), 0, $startlinepos);
				if (isset($opentagpos) AND isset($this->footerlen[$startlinepage]) AND (!$this->InFooter)) {
					$this->footerpos[$startlinepage] = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
					$midpos = min($opentagpos, $this->footerpos[$startlinepage]);
				} elseif (isset($opentagpos)) {
					$midpos = $opentagpos;
				} elseif (isset($this->footerlen[$startlinepage]) AND (!$this->InFooter)) {
					$this->footerpos[$startlinepage] = $this->pagelen[$startlinepage] - $this->footerlen[$startlinepage];
					$midpos = $this->footerpos[$startlinepage];
				} else {
					$midpos = 0;
				}
				if ($midpos > 0) {
					$pmid = substr($this->getPageBuffer($startlinepage), $startlinepos, ($midpos - $startlinepos));
					$pend = substr($this->getPageBuffer($startlinepage), $midpos);
				} else {
					$pmid = substr($this->getPageBuffer($startlinepage), $startlinepos);
					$pend = '';
				}
			}
			if ((isset($plalign) AND ((($plalign == 'C') OR (($plalign == 'R') AND (!$this->rtl)) OR (($plalign == 'L') AND ($this->rtl)))))) {
				// calculate shifting amount
				$tw = $w;
				if ($this->lMargin != $prevlMargin) {
					$tw += ($prevlMargin - $this->lMargin);
				}
				if ($this->rMargin != $prevrMargin) {
					$tw += ($prevrMargin - $this->rMargin);
				}
				$one_space_width = $this->GetStringWidth(chr(32));
				$no = 0; // number of spaces on a line contained on a single block
				if ($this->isRTLTextDir()) { // RTL
					// remove left space if exist
					$pos1 = TCPDF_STATIC::revstrpos($pmid, '[(');
					if ($pos1 > 0) {
						$pos1 = intval($pos1);
						if ($this->isUnicodeFont()) {
							$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, '[('.chr(0).chr(32)));
							$spacelen = 2;
						} else {
							$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, '[('.chr(32)));
							$spacelen = 1;
						}
						if ($pos1 == $pos2) {
							$pmid = substr($pmid, 0, ($pos1 + 2)).substr($pmid, ($pos1 + 2 + $spacelen));
							if (substr($pmid, $pos1, 4) == '[()]') {
								$linew -= $one_space_width;
							} elseif ($pos1 == strpos($pmid, '[(')) {
								$no = 1;
							}
						}
					}
				} else { // LTR
					// remove right space if exist
					$pos1 = TCPDF_STATIC::revstrpos($pmid, ')]');
					if ($pos1 > 0) {
						$pos1 = intval($pos1);
						if ($this->isUnicodeFont()) {
							$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, chr(0).chr(32).')]')) + 2;
							$spacelen = 2;
						} else {
							$pos2 = intval(TCPDF_STATIC::revstrpos($pmid, chr(32).')]')) + 1;
							$spacelen = 1;
						}
						if ($pos1 == $pos2) {
							$pmid = substr($pmid, 0, ($pos1 - $spacelen)).substr($pmid, $pos1);
							$linew -= $one_space_width;
						}
					}
				}
				$mdiff = ($tw - $linew);
				if ($plalign == 'C') {
					if ($this->rtl) {
						$t_x = -($mdiff / 2);
					} else {
						$t_x = ($mdiff / 2);
					}
				} elseif ($plalign == 'R') {
					// right alignment on LTR document
					$t_x = $mdiff;
				} elseif ($plalign == 'L') {
					// left alignment on RTL document
					$t_x = -$mdiff;
				}
			} // end if startlinex
			if (($t_x != 0) OR ($yshift < 0)) {
				// shift the line
				$trx = sprintf('1 0 0 1 %F %F cm', ($t_x * $this->k), ($yshift * $this->k));
				$pstart .= "\nq\n".$trx."\n".$pmid."\nQ\n";
				$endlinepos = strlen($pstart);
				if ($this->inxobj) {
					// we are inside an XObject template
					$this->xobjects[$this->xobjid]['outdata'] = $pstart.$pend;
					foreach ($this->xobjects[$this->xobjid]['annotations'] as $pak => $pac) {
						if ($pak >= $pask) {
							$this->xobjects[$this->xobjid]['annotations'][$pak]['x'] += $t_x;
							$this->xobjects[$this->xobjid]['annotations'][$pak]['y'] -= $yshift;
						}
					}
				} else {
					$this->setPageBuffer($startlinepage, $pstart.$pend);
					// shift the annotations and links
					if (isset($this->PageAnnots[$this->page])) {
						foreach ($this->PageAnnots[$this->page] as $pak => $pac) {
							if ($pak >= $pask) {
								$this->PageAnnots[$this->page][$pak]['x'] += $t_x;
								$this->PageAnnots[$this->page][$pak]['y'] -= $yshift;
							}
						}
					}
				}
				$this->y -= $yshift;
				$yshift = 0;
			}
		}
		// restore previous values
		$this->setGraphicVars($gvars);
		if ($this->num_columns > 1) {
			$this->selectColumn();
		} elseif ($this->page > $prevPage) {
			$this->lMargin = $this->pagedim[$this->page]['olm'];
			$this->rMargin = $this->pagedim[$this->page]['orm'];
		}
		// restore previous list state
		$this->cell_height_ratio = $prev_cell_height_ratio;
		$this->listnum = $prev_listnum;
		$this->listordered = $prev_listordered;
		$this->listcount = $prev_listcount;
		$this->lispacer = $prev_lispacer;
		if ($ln AND (!($cell AND ($dom[$key-1]['value'] == 'table')))) {
			$this->Ln($this->lasth);
			if (($this->y < $maxbottomliney) AND ($startlinepage == $this->page)) {
				$this->y = $maxbottomliney;
			}
		}
		unset($dom);
	}

	/**
	 * Process opening tags.
	 * @param $dom (array) html dom array
	 * @param $key (int) current element id
	 * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
	 * @return $dom array
	 * @protected
	 */
	protected function openHTMLTagHandler($dom, $key, $cell) {
		$tag = $dom[$key];
		$parent = $dom[($dom[$key]['parent'])];
		$firsttag = ($key == 1);
		// check for text direction attribute
		if (isset($tag['dir'])) {
			$this->setTempRTL($tag['dir']);
		} else {
			$this->tmprtl = false;
		}
		if ($tag['block']) {
			$hbz = 0; // distance from y to line bottom
			$hb = 0; // vertical space between block tags
			// calculate vertical space for block tags
			if (isset($this->tagvspaces[$tag['value']][0]['h']) AND ($this->tagvspaces[$tag['value']][0]['h'] >= 0)) {
				$cur_h = $this->tagvspaces[$tag['value']][0]['h'];
			} elseif (isset($tag['fontsize'])) {
				$cur_h = $this->getCellHeight($tag['fontsize'] / $this->k);
			} else {
				$cur_h = $this->getCellHeight($this->FontSize);
			}
			if (isset($this->tagvspaces[$tag['value']][0]['n'])) {
				$on = $this->tagvspaces[$tag['value']][0]['n'];
			} elseif (preg_match('/[h][0-9]/', $tag['value']) > 0) {
				$on = 0.6;
			} else {
				$on = 1;
			}
			if ((!isset($this->tagvspaces[$tag['value']])) AND (in_array($tag['value'], array('div', 'dt', 'dd', 'li', 'br', 'hr')))) {
				$hb = 0;
			} else {
				$hb = ($on * $cur_h);
			}
			if (($this->htmlvspace <= 0) AND ($on > 0)) {
				if (isset($parent['fontsize'])) {
					$hbz = (($parent['fontsize'] / $this->k) * $this->cell_height_ratio);
				} else {
					$hbz = $this->getCellHeight($this->FontSize);
				}
			}
			if (isset($dom[($key - 1)]) AND ($dom[($key - 1)]['value'] == 'table')) {
				// fix vertical space after table
				$hbz = 0;
			}
			// closing vertical space
			$hbc = 0;
			if (isset($this->tagvspaces[$tag['value']][1]['h']) AND ($this->tagvspaces[$tag['value']][1]['h'] >= 0)) {
				$pre_h = $this->tagvspaces[$tag['value']][1]['h'];
			} elseif (isset($parent['fontsize'])) {
				$pre_h = $this->getCellHeight($parent['fontsize'] / $this->k);
			} else {
				$pre_h = $this->getCellHeight($this->FontSize);
			}
			if (isset($this->tagvspaces[$tag['value']][1]['n'])) {
				$cn = $this->tagvspaces[$tag['value']][1]['n'];
			} elseif (preg_match('/[h][0-9]/', $tag['value']) > 0) {
				$cn = 0.6;
			} else {
				$cn = 1;
			}
			if (isset($this->tagvspaces[$tag['value']][1])) {
				$hbc = ($cn * $pre_h);
			}
		}
		// Opening tag
		switch($tag['value']) {
			case 'table': {
				$cp = 0;
				$cs = 0;
				$dom[$key]['rowspans'] = array();
				if (!isset($dom[$key]['attribute']['nested']) OR ($dom[$key]['attribute']['nested'] != 'true')) {
					$this->htmlvspace = 0;
					// set table header
					if (!TCPDF_STATIC::empty_string($dom[$key]['thead'])) {
						// set table header
						$this->thead = $dom[$key]['thead'];
						if (!isset($this->theadMargins) OR (empty($this->theadMargins))) {
							$this->theadMargins = array();
							$this->theadMargins['cell_padding'] = $this->cell_padding;
							$this->theadMargins['lmargin'] = $this->lMargin;
							$this->theadMargins['rmargin'] = $this->rMargin;
							$this->theadMargins['page'] = $this->page;
							$this->theadMargins['cell'] = $cell;
							$this->theadMargins['gvars'] = $this->getGraphicVars();
						}
					}
				}
				// store current margins and page
				$dom[$key]['old_cell_padding'] = $this->cell_padding;
				if (isset($tag['attribute']['cellpadding'])) {
					$pad = $this->getHTMLUnitToUnits($tag['attribute']['cellpadding'], 1, 'px');
					$this->SetCellPadding($pad);
				} elseif (isset($tag['padding'])) {
					$this->cell_padding = $tag['padding'];
				}
				if (isset($tag['attribute']['cellspacing'])) {
					$cs = $this->getHTMLUnitToUnits($tag['attribute']['cellspacing'], 1, 'px');
				} elseif (isset($tag['border-spacing'])) {
					$cs = $tag['border-spacing']['V'];
				}
				$prev_y = $this->y;
				if ($this->checkPageBreak(((2 * $cp) + (2 * $cs) + $this->lasth), '', false) OR ($this->y < $prev_y)) {
					$this->inthead = true;
					// add a page (or trig AcceptPageBreak() for multicolumn mode)
					$this->checkPageBreak($this->PageBreakTrigger + 1);
				}
				break;
			}
			case 'tr': {
				// array of columns positions
				$dom[$key]['cellpos'] = array();
				break;
			}
			case 'hr': {
				if ((isset($tag['height'])) AND ($tag['height'] != '')) {
					$hrHeight = $this->getHTMLUnitToUnits($tag['height'], 1, 'px');
				} else {
					$hrHeight = $this->GetLineWidth();
				}
				$this->addHTMLVertSpace($hbz, max($hb, ($hrHeight / 2)), $cell, $firsttag);
				$x = $this->GetX();
				$y = $this->GetY();
				$wtmp = $this->w - $this->lMargin - $this->rMargin;
				if ($cell) {
					$wtmp -= ($this->cell_padding['L'] + $this->cell_padding['R']);
				}
				if ((isset($tag['width'])) AND ($tag['width'] != '')) {
					$hrWidth = $this->getHTMLUnitToUnits($tag['width'], $wtmp, 'px');
				} else {
					$hrWidth = $wtmp;
				}
				$prevlinewidth = $this->GetLineWidth();
				$this->SetLineWidth($hrHeight);
				$this->Line($x, $y, $x + $hrWidth, $y);
				$this->SetLineWidth($prevlinewidth);
				$this->addHTMLVertSpace(max($hbc, ($hrHeight / 2)), 0, $cell, !isset($dom[($key + 1)]));
				break;
			}
			case 'a': {
				if (array_key_exists('href', $tag['attribute'])) {
					$this->HREF['url'] = $tag['attribute']['href'];
				}
				break;
			}
			case 'img': {
				if (!empty($tag['attribute']['src'])) {
					if ($tag['attribute']['src'][0] === '@') {
						// data stream
						$tag['attribute']['src'] = '@'.base64_decode(substr($tag['attribute']['src'], 1));
						$type = '';
					} else {
						// get image type
						$type = TCPDF_IMAGES::getImageFileType($tag['attribute']['src']);
					}
					if (!isset($tag['width'])) {
						$tag['width'] = 0;
					}
					if (!isset($tag['height'])) {
						$tag['height'] = 0;
					}
					//if (!isset($tag['attribute']['align'])) {
						// the only alignment supported is "bottom"
						// further development is required for other modes.
						$tag['attribute']['align'] = 'bottom';
					//}
					switch($tag['attribute']['align']) {
						case 'top': {
							$align = 'T';
							break;
						}
						case 'middle': {
							$align = 'M';
							break;
						}
						case 'bottom': {
							$align = 'B';
							break;
						}
						default: {
							$align = 'B';
							break;
						}
					}
					$prevy = $this->y;
					$xpos = $this->x;
					$imglink = '';
					if (isset($this->HREF['url']) AND !TCPDF_STATIC::empty_string($this->HREF['url'])) {
						$imglink = $this->HREF['url'];
						if ($imglink[0] == '#') {
							// convert url to internal link
							$lnkdata = explode(',', $imglink);
							if (isset($lnkdata[0])) {
								$page = intval(substr($lnkdata[0], 1));
								if (empty($page) OR ($page <= 0)) {
									$page = $this->page;
								}
								if (isset($lnkdata[1]) AND (strlen($lnkdata[1]) > 0)) {
									$lnky = floatval($lnkdata[1]);
								} else {
									$lnky = 0;
								}
								$imglink = $this->AddLink();
								$this->SetLink($imglink, $lnky, $page);
							}
						}
					}
					$border = 0;
					if (isset($tag['border']) AND !empty($tag['border'])) {
						// currently only support 1 (frame) or a combination of 'LTRB'
						$border = $tag['border'];
					}
					$iw = '';
					if (isset($tag['width'])) {
						$iw = $this->getHTMLUnitToUnits($tag['width'], ($tag['fontsize'] / $this->k), 'px', false);
					}
					$ih = '';
					if (isset($tag['height'])) {
						$ih = $this->getHTMLUnitToUnits($tag['height'], ($tag['fontsize'] / $this->k), 'px', false);
					}
					if (($type == 'eps') OR ($type == 'ai')) {
						$this->ImageEps($tag['attribute']['src'], $xpos, $this->y, $iw, $ih, $imglink, true, $align, '', $border, true);
					} elseif ($type == 'svg') {
						$this->ImageSVG($tag['attribute']['src'], $xpos, $this->y, $iw, $ih, $imglink, $align, '', $border, true);
					} else {
						$this->Image($tag['attribute']['src'], $xpos, $this->y, $iw, $ih, '', $imglink, $align, false, 300, '', false, false, $border, false, false, true);
					}
					switch($align) {
						case 'T': {
							$this->y = $prevy;
							break;
						}
						case 'M': {
							$this->y = (($this->img_rb_y + $prevy - ($this->getCellHeight($tag['fontsize'] / $this->k))) / 2);
							break;
						}
						case 'B': {
							$this->y = $this->img_rb_y - ($this->getCellHeight($tag['fontsize'] / $this->k) - ($this->getFontDescent($tag['fontname'], $tag['fontstyle'], $tag['fontsize']) * $this->cell_height_ratio));
							break;
						}
					}
				}
				break;
			}
			case 'dl': {
				++$this->listnum;
				if ($this->listnum == 1) {
					$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				} else {
					$this->addHTMLVertSpace(0, 0, $cell, $firsttag);
				}
				break;
			}
			case 'dt': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'dd': {
				if ($this->rtl) {
					$this->rMargin += $this->listindent;
				} else {
					$this->lMargin += $this->listindent;
				}
				++$this->listindentlevel;
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'ul':
			case 'ol': {
				++$this->listnum;
				if ($tag['value'] == 'ol') {
					$this->listordered[$this->listnum] = true;
				} else {
					$this->listordered[$this->listnum] = false;
				}
				if (isset($tag['attribute']['start'])) {
					$this->listcount[$this->listnum] = intval($tag['attribute']['start']) - 1;
				} else {
					$this->listcount[$this->listnum] = 0;
				}
				if ($this->rtl) {
					$this->rMargin += $this->listindent;
					$this->x -= $this->listindent;
				} else {
					$this->lMargin += $this->listindent;
					$this->x += $this->listindent;
				}
				++$this->listindentlevel;
				if ($this->listnum == 1) {
					if ($key > 1) {
						$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
					}
				} else {
					$this->addHTMLVertSpace(0, 0, $cell, $firsttag);
				}
				break;
			}
			case 'li': {
				if ($key > 2) {
					$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				}
				if ($this->listordered[$this->listnum]) {
					// ordered item
					if (isset($parent['attribute']['type']) AND !TCPDF_STATIC::empty_string($parent['attribute']['type'])) {
						$this->lispacer = $parent['attribute']['type'];
					} elseif (isset($parent['listtype']) AND !TCPDF_STATIC::empty_string($parent['listtype'])) {
						$this->lispacer = $parent['listtype'];
					} elseif (isset($this->lisymbol) AND !TCPDF_STATIC::empty_string($this->lisymbol)) {
						$this->lispacer = $this->lisymbol;
					} else {
						$this->lispacer = '#';
					}
					++$this->listcount[$this->listnum];
					if (isset($tag['attribute']['value'])) {
						$this->listcount[$this->listnum] = intval($tag['attribute']['value']);
					}
				} else {
					// unordered item
					if (isset($parent['attribute']['type']) AND !TCPDF_STATIC::empty_string($parent['attribute']['type'])) {
						$this->lispacer = $parent['attribute']['type'];
					} elseif (isset($parent['listtype']) AND !TCPDF_STATIC::empty_string($parent['listtype'])) {
						$this->lispacer = $parent['listtype'];
					} elseif (isset($this->lisymbol) AND !TCPDF_STATIC::empty_string($this->lisymbol)) {
						$this->lispacer = $this->lisymbol;
					} else {
						$this->lispacer = '!';
					}
				}
				break;
			}
			case 'blockquote': {
				if ($this->rtl) {
					$this->rMargin += $this->listindent;
				} else {
					$this->lMargin += $this->listindent;
				}
				++$this->listindentlevel;
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'br': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'div': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'p': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			case 'pre': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				$this->premode = true;
				break;
			}
			case 'sup': {
				$this->SetXY($this->GetX(), $this->GetY() - ((0.7 * $this->FontSizePt) / $this->k));
				break;
			}
			case 'sub': {
				$this->SetXY($this->GetX(), $this->GetY() + ((0.3 * $this->FontSizePt) / $this->k));
				break;
			}
			case 'h1':
			case 'h2':
			case 'h3':
			case 'h4':
			case 'h5':
			case 'h6': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, $firsttag);
				break;
			}
			// Form fields (since 4.8.000 - 2009-09-07)
			case 'form': {
				if (isset($tag['attribute']['action'])) {
					$this->form_action = $tag['attribute']['action'];
				} else {
					$this->Error('Please explicitly set action attribute path!');
				}
				if (isset($tag['attribute']['enctype'])) {
					$this->form_enctype = $tag['attribute']['enctype'];
				} else {
					$this->form_enctype = 'application/x-www-form-urlencoded';
				}
				if (isset($tag['attribute']['method'])) {
					$this->form_mode = $tag['attribute']['method'];
				} else {
					$this->form_mode = 'post';
				}
				break;
			}
			case 'input': {
				if (isset($tag['attribute']['name']) AND !TCPDF_STATIC::empty_string($tag['attribute']['name'])) {
					$name = $tag['attribute']['name'];
				} else {
					break;
				}
				$prop = array();
				$opt = array();
				if (isset($tag['attribute']['readonly']) AND !TCPDF_STATIC::empty_string($tag['attribute']['readonly'])) {
					$prop['readonly'] = true;
				}
				if (isset($tag['attribute']['value']) AND !TCPDF_STATIC::empty_string($tag['attribute']['value'])) {
					$value = $tag['attribute']['value'];
				}
				if (isset($tag['attribute']['maxlength']) AND !TCPDF_STATIC::empty_string($tag['attribute']['maxlength'])) {
					$opt['maxlen'] = intval($tag['attribute']['maxlength']);
				}
				$h = $this->getCellHeight($this->FontSize);
				if (isset($tag['attribute']['size']) AND !TCPDF_STATIC::empty_string($tag['attribute']['size'])) {
					$w = intval($tag['attribute']['size']) * $this->GetStringWidth(chr(32)) * 2;
				} else {
					$w = $h;
				}
				if (isset($tag['attribute']['checked']) AND (($tag['attribute']['checked'] == 'checked') OR ($tag['attribute']['checked'] == 'true'))) {
					$checked = true;
				} else {
					$checked = false;
				}
				if (isset($tag['align'])) {
					switch ($tag['align']) {
						case 'C': {
							$opt['q'] = 1;
							break;
						}
						case 'R': {
							$opt['q'] = 2;
							break;
						}
						case 'L':
						default: {
							break;
						}
					}
				}
				switch ($tag['attribute']['type']) {
					case 'text': {
						if (isset($value)) {
							$opt['v'] = $value;
						}
						$this->TextField($name, $w, $h, $prop, $opt, '', '', false);
						break;
					}
					case 'password': {
						if (isset($value)) {
							$opt['v'] = $value;
						}
						$prop['password'] = 'true';
						$this->TextField($name, $w, $h, $prop, $opt, '', '', false);
						break;
					}
					case 'checkbox': {
						if (!isset($value)) {
							break;
						}
						$this->CheckBox($name, $w, $checked, $prop, $opt, $value, '', '', false);
						break;
					}
					case 'radio': {
						if (!isset($value)) {
							break;
						}
						$this->RadioButton($name, $w, $prop, $opt, $value, $checked, '', '', false);
						break;
					}
					case 'submit': {
						if (!isset($value)) {
							$value = 'submit';
						}
						$w = $this->GetStringWidth($value) * 1.5;
						$h *= 1.6;
						$prop = array('lineWidth'=>1, 'borderStyle'=>'beveled', 'fillColor'=>array(196, 196, 196), 'strokeColor'=>array(255, 255, 255));
						$action = array();
						$action['S'] = 'SubmitForm';
						$action['F'] = $this->form_action;
						if ($this->form_enctype != 'FDF') {
							$action['Flags'] = array('ExportFormat');
						}
						if ($this->form_mode == 'get') {
							$action['Flags'] = array('GetMethod');
						}
						$this->Button($name, $w, $h, $value, $action, $prop, $opt, '', '', false);
						break;
					}
					case 'reset': {
						if (!isset($value)) {
							$value = 'reset';
						}
						$w = $this->GetStringWidth($value) * 1.5;
						$h *= 1.6;
						$prop = array('lineWidth'=>1, 'borderStyle'=>'beveled', 'fillColor'=>array(196, 196, 196), 'strokeColor'=>array(255, 255, 255));
						$this->Button($name, $w, $h, $value, array('S'=>'ResetForm'), $prop, $opt, '', '', false);
						break;
					}
					case 'file': {
						$prop['fileSelect'] = 'true';
						$this->TextField($name, $w, $h, $prop, $opt, '', '', false);
						if (!isset($value)) {
							$value = '*';
						}
						$w = $this->GetStringWidth($value) * 2;
						$h *= 1.2;
						$prop = array('lineWidth'=>1, 'borderStyle'=>'beveled', 'fillColor'=>array(196, 196, 196), 'strokeColor'=>array(255, 255, 255));
						$jsaction = 'var f=this.getField(\''.$name.'\'); f.browseForFileToSubmit();';
						$this->Button('FB_'.$name, $w, $h, $value, $jsaction, $prop, $opt, '', '', false);
						break;
					}
					case 'hidden': {
						if (isset($value)) {
							$opt['v'] = $value;
						}
						$opt['f'] = array('invisible', 'hidden');
						$this->TextField($name, 0, 0, $prop, $opt, '', '', false);
						break;
					}
					case 'image': {
						// THIS TYPE MUST BE FIXED
						if (isset($tag['attribute']['src']) AND !TCPDF_STATIC::empty_string($tag['attribute']['src'])) {
							$img = $tag['attribute']['src'];
						} else {
							break;
						}
						$value = 'img';
						//$opt['mk'] = array('i'=>$img, 'tp'=>1, 'if'=>array('sw'=>'A', 's'=>'A', 'fb'=>false));
						if (isset($tag['attribute']['onclick']) AND !empty($tag['attribute']['onclick'])) {
							$jsaction = $tag['attribute']['onclick'];
						} else {
							$jsaction = '';
						}
						$this->Button($name, $w, $h, $value, $jsaction, $prop, $opt, '', '', false);
						break;
					}
					case 'button': {
						if (!isset($value)) {
							$value = ' ';
						}
						$w = $this->GetStringWidth($value) * 1.5;
						$h *= 1.6;
						$prop = array('lineWidth'=>1, 'borderStyle'=>'beveled', 'fillColor'=>array(196, 196, 196), 'strokeColor'=>array(255, 255, 255));
						if (isset($tag['attribute']['onclick']) AND !empty($tag['attribute']['onclick'])) {
							$jsaction = $tag['attribute']['onclick'];
						} else {
							$jsaction = '';
						}
						$this->Button($name, $w, $h, $value, $jsaction, $prop, $opt, '', '', false);
						break;
					}
				}
				break;
			}
			case 'textarea': {
				$prop = array();
				$opt = array();
				if (isset($tag['attribute']['readonly']) AND !TCPDF_STATIC::empty_string($tag['attribute']['readonly'])) {
					$prop['readonly'] = true;
				}
				if (isset($tag['attribute']['name']) AND !TCPDF_STATIC::empty_string($tag['attribute']['name'])) {
					$name = $tag['attribute']['name'];
				} else {
					break;
				}
				if (isset($tag['attribute']['value']) AND !TCPDF_STATIC::empty_string($tag['attribute']['value'])) {
					$opt['v'] = $tag['attribute']['value'];
				}
				if (isset($tag['attribute']['cols']) AND !TCPDF_STATIC::empty_string($tag['attribute']['cols'])) {
					$w = intval($tag['attribute']['cols']) * $this->GetStringWidth(chr(32)) * 2;
				} else {
					$w = 40;
				}
				if (isset($tag['attribute']['rows']) AND !TCPDF_STATIC::empty_string($tag['attribute']['rows'])) {
					$h = intval($tag['attribute']['rows']) * $this->getCellHeight($this->FontSize);
				} else {
					$h = 10;
				}
				$prop['multiline'] = 'true';
				$this->TextField($name, $w, $h, $prop, $opt, '', '', false);
				break;
			}
			case 'select': {
				$h = $this->getCellHeight($this->FontSize);
				if (isset($tag['attribute']['size']) AND !TCPDF_STATIC::empty_string($tag['attribute']['size'])) {
					$h *= ($tag['attribute']['size'] + 1);
				}
				$prop = array();
				$opt = array();
				if (isset($tag['attribute']['name']) AND !TCPDF_STATIC::empty_string($tag['attribute']['name'])) {
					$name = $tag['attribute']['name'];
				} else {
					break;
				}
				$w = 0;
				if (isset($tag['attribute']['opt']) AND !TCPDF_STATIC::empty_string($tag['attribute']['opt'])) {
					$options = explode('#!NwL!#', $tag['attribute']['opt']);
					$values = array();
					foreach ($options as $val) {
						if (strpos($val, '#!TaB!#') !== false) {
							$opts = explode('#!TaB!#', $val);
							$values[] = $opts;
							$w = max($w, $this->GetStringWidth($opts[1]));
						} else {
							$values[] = $val;
							$w = max($w, $this->GetStringWidth($val));
						}
					}
				} else {
					break;
				}
				$w *= 2;
				if (isset($tag['attribute']['multiple']) AND ($tag['attribute']['multiple']='multiple')) {
					$prop['multipleSelection'] = 'true';
					$this->ListBox($name, $w, $h, $values, $prop, $opt, '', '', false);
				} else {
					$this->ComboBox($name, $w, $h, $values, $prop, $opt, '', '', false);
				}
				break;
			}
			case 'tcpdf': {
				if (defined('K_TCPDF_CALLS_IN_HTML') AND (K_TCPDF_CALLS_IN_HTML === true)) {
					// Special tag used to call TCPDF methods
					if (isset($tag['attribute']['method'])) {
						$tcpdf_method = $tag['attribute']['method'];
						if (method_exists($this, $tcpdf_method)) {
							if (isset($tag['attribute']['params']) AND (!empty($tag['attribute']['params']))) {
								$params = $this->unserializeTCPDFtagParameters($tag['attribute']['params']);
								call_user_func_array(array($this, $tcpdf_method), $params);
							} else {
								$this->$tcpdf_method();
							}
							$this->newline = true;
						}
					}
				}
				break;
			}
			default: {
				break;
			}
		}
		// define tags that support borders and background colors
		$bordertags = array('blockquote','br','dd','dl','div','dt','h1','h2','h3','h4','h5','h6','hr','li','ol','p','pre','ul','tcpdf','table');
		if (in_array($tag['value'], $bordertags)) {
			// set border
			$dom[$key]['borderposition'] = $this->getBorderStartPosition();
		}
		if ($dom[$key]['self'] AND isset($dom[$key]['attribute']['pagebreakafter'])) {
			$pba = $dom[$key]['attribute']['pagebreakafter'];
			// check for pagebreak
			if (($pba == 'true') OR ($pba == 'left') OR ($pba == 'right')) {
				// add a page (or trig AcceptPageBreak() for multicolumn mode)
				$this->checkPageBreak($this->PageBreakTrigger + 1);
			}
			if ((($pba == 'left') AND (((!$this->rtl) AND (($this->page % 2) == 0)) OR (($this->rtl) AND (($this->page % 2) != 0))))
				OR (($pba == 'right') AND (((!$this->rtl) AND (($this->page % 2) != 0)) OR (($this->rtl) AND (($this->page % 2) == 0))))) {
				// add a page (or trig AcceptPageBreak() for multicolumn mode)
				$this->checkPageBreak($this->PageBreakTrigger + 1);
			}
		}
		return $dom;
	}

	/**
	 * Process closing tags.
	 * @param $dom (array) html dom array
	 * @param $key (int) current element id
	 * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
	 * @param $maxbottomliney (int) maximum y value of current line
	 * @return $dom array
	 * @protected
	 */
	protected function closeHTMLTagHandler($dom, $key, $cell, $maxbottomliney=0) {
		$tag = $dom[$key];
		$parent = $dom[($dom[$key]['parent'])];
		$lasttag = ((!isset($dom[($key + 1)])) OR ((!isset($dom[($key + 2)])) AND ($dom[($key + 1)]['value'] == 'marker')));
		$in_table_head = false;
		// maximum x position (used to draw borders)
		if ($this->rtl) {
			$xmax = $this->w;
		} else {
			$xmax = 0;
		}
		if ($tag['block']) {
			$hbz = 0; // distance from y to line bottom
			$hb = 0; // vertical space between block tags
			// calculate vertical space for block tags
			if (isset($this->tagvspaces[$tag['value']][1]['h']) AND ($this->tagvspaces[$tag['value']][1]['h'] >= 0)) {
				$pre_h = $this->tagvspaces[$tag['value']][1]['h'];
			} elseif (isset($parent['fontsize'])) {
				$pre_h = $this->getCellHeight($parent['fontsize'] / $this->k);
			} else {
				$pre_h = $this->getCellHeight($this->FontSize);
			}
			if (isset($this->tagvspaces[$tag['value']][1]['n'])) {
				$cn = $this->tagvspaces[$tag['value']][1]['n'];
			} elseif (preg_match('/[h][0-9]/', $tag['value']) > 0) {
				$cn = 0.6;
			} else {
				$cn = 1;
			}
			if ((!isset($this->tagvspaces[$tag['value']])) AND ($tag['value'] == 'div')) {
				$hb = 0;
			} else {
				$hb = ($cn * $pre_h);
			}
			if ($maxbottomliney > $this->PageBreakTrigger) {
				$hbz = $this->getCellHeight($this->FontSize);
			} elseif ($this->y < $maxbottomliney) {
				$hbz = ($maxbottomliney - $this->y);
			}
		}
		// Closing tag
		switch($tag['value']) {
			case 'tr': {
				$table_el = $dom[($dom[$key]['parent'])]['parent'];
				if (!isset($parent['endy'])) {
					$dom[($dom[$key]['parent'])]['endy'] = $this->y;
					$parent['endy'] = $this->y;
				}
				if (!isset($parent['endpage'])) {
					$dom[($dom[$key]['parent'])]['endpage'] = $this->page;
					$parent['endpage'] = $this->page;
				}
				if (!isset($parent['endcolumn'])) {
					$dom[($dom[$key]['parent'])]['endcolumn'] = $this->current_column;
					$parent['endcolumn'] = $this->current_column;
				}
				// update row-spanned cells
				if (isset($dom[$table_el]['rowspans'])) {
					foreach ($dom[$table_el]['rowspans'] as $k => $trwsp) {
						$dom[$table_el]['rowspans'][$k]['rowspan'] -= 1;
						if ($dom[$table_el]['rowspans'][$k]['rowspan'] == 0) {
							if (($dom[$table_el]['rowspans'][$k]['endpage'] == $parent['endpage']) AND ($dom[$table_el]['rowspans'][$k]['endcolumn'] == $parent['endcolumn'])) {
								$dom[($dom[$key]['parent'])]['endy'] = max($dom[$table_el]['rowspans'][$k]['endy'], $parent['endy']);
							} elseif (($dom[$table_el]['rowspans'][$k]['endpage'] > $parent['endpage']) OR ($dom[$table_el]['rowspans'][$k]['endcolumn'] > $parent['endcolumn'])) {
								$dom[($dom[$key]['parent'])]['endy'] = $dom[$table_el]['rowspans'][$k]['endy'];
								$dom[($dom[$key]['parent'])]['endpage'] = $dom[$table_el]['rowspans'][$k]['endpage'];
								$dom[($dom[$key]['parent'])]['endcolumn'] = $dom[$table_el]['rowspans'][$k]['endcolumn'];
							}
						}
					}
					// report new endy and endpage to the rowspanned cells
					foreach ($dom[$table_el]['rowspans'] as $k => $trwsp) {
						if ($dom[$table_el]['rowspans'][$k]['rowspan'] == 0) {
							$dom[$table_el]['rowspans'][$k]['endpage'] = max($dom[$table_el]['rowspans'][$k]['endpage'], $dom[($dom[$key]['parent'])]['endpage']);
							$dom[($dom[$key]['parent'])]['endpage'] = $dom[$table_el]['rowspans'][$k]['endpage'];
							$dom[$table_el]['rowspans'][$k]['endcolumn'] = max($dom[$table_el]['rowspans'][$k]['endcolumn'], $dom[($dom[$key]['parent'])]['endcolumn']);
							$dom[($dom[$key]['parent'])]['endcolumn'] = $dom[$table_el]['rowspans'][$k]['endcolumn'];
							$dom[$table_el]['rowspans'][$k]['endy'] = max($dom[$table_el]['rowspans'][$k]['endy'], $dom[($dom[$key]['parent'])]['endy']);
							$dom[($dom[$key]['parent'])]['endy'] = $dom[$table_el]['rowspans'][$k]['endy'];
						}
					}
					// update remaining rowspanned cells
					foreach ($dom[$table_el]['rowspans'] as $k => $trwsp) {
						if ($dom[$table_el]['rowspans'][$k]['rowspan'] == 0) {
							$dom[$table_el]['rowspans'][$k]['endpage'] = $dom[($dom[$key]['parent'])]['endpage'];
							$dom[$table_el]['rowspans'][$k]['endcolumn'] = $dom[($dom[$key]['parent'])]['endcolumn'];
							$dom[$table_el]['rowspans'][$k]['endy'] = $dom[($dom[$key]['parent'])]['endy'];
						}
					}
				}
				$prev_page = $this->page;
				$this->setPage($dom[($dom[$key]['parent'])]['endpage']);
				if ($this->num_columns > 1) {
					if (($prev_page < $this->page)
						AND ((($this->current_column == 0) AND ($dom[($dom[$key]['parent'])]['endcolumn'] == ($this->num_columns - 1)))
							OR ($this->current_column == $dom[($dom[$key]['parent'])]['endcolumn']))) {
						// page jump
						$this->selectColumn(0);
						$dom[($dom[$key]['parent'])]['endcolumn'] = 0;
						$dom[($dom[$key]['parent'])]['endy'] = $this->y;
					} else {
						$this->selectColumn($dom[($dom[$key]['parent'])]['endcolumn']);
						$this->y = $dom[($dom[$key]['parent'])]['endy'];
					}
				} else {
					$this->y = $dom[($dom[$key]['parent'])]['endy'];
				}
				if (isset($dom[$table_el]['attribute']['cellspacing'])) {
					$this->y += $this->getHTMLUnitToUnits($dom[$table_el]['attribute']['cellspacing'], 1, 'px');
				} elseif (isset($dom[$table_el]['border-spacing'])) {
					$this->y += $dom[$table_el]['border-spacing']['V'];
				}
				$this->Ln(0, $cell);
				if ($this->current_column == $parent['startcolumn']) {
					$this->x = $parent['startx'];
				}
				// account for booklet mode
				if ($this->page > $parent['startpage']) {
					if (($this->rtl) AND ($this->pagedim[$this->page]['orm'] != $this->pagedim[$parent['startpage']]['orm'])) {
						$this->x -= ($this->pagedim[$this->page]['orm'] - $this->pagedim[$parent['startpage']]['orm']);
					} elseif ((!$this->rtl) AND ($this->pagedim[$this->page]['olm'] != $this->pagedim[$parent['startpage']]['olm'])) {
						$this->x += ($this->pagedim[$this->page]['olm'] - $this->pagedim[$parent['startpage']]['olm']);
					}
				}
				break;
			}
			case 'tablehead':
				// closing tag used for the thead part
				$in_table_head = true;
				$this->inthead = false;
			case 'table': {
				$table_el = $parent;
				// set default border
				if (isset($table_el['attribute']['border']) AND ($table_el['attribute']['border'] > 0)) {
					// set default border
					$border = array('LTRB' => array('width' => $this->getCSSBorderWidth($table_el['attribute']['border']), 'cap'=>'square', 'join'=>'miter', 'dash'=> 0, 'color'=>array(0,0,0)));
				} else {
					$border = 0;
				}
				$default_border = $border;
				// fix bottom line alignment of last line before page break
				foreach ($dom[($dom[$key]['parent'])]['trids'] as $j => $trkey) {
					// update row-spanned cells
					if (isset($dom[($dom[$key]['parent'])]['rowspans'])) {
						foreach ($dom[($dom[$key]['parent'])]['rowspans'] as $k => $trwsp) {
							if (isset($prevtrkey) AND ($trwsp['trid'] == $prevtrkey) AND ($trwsp['mrowspan'] > 0)) {
								$dom[($dom[$key]['parent'])]['rowspans'][$k]['trid'] = $trkey;
							}
							if ($dom[($dom[$key]['parent'])]['rowspans'][$k]['trid'] == $trkey) {
								$dom[($dom[$key]['parent'])]['rowspans'][$k]['mrowspan'] -= 1;
							}
						}
					}
					if (isset($prevtrkey) AND ($dom[$trkey]['startpage'] > $dom[$prevtrkey]['endpage'])) {
						$pgendy = $this->pagedim[$dom[$prevtrkey]['endpage']]['hk'] - $this->pagedim[$dom[$prevtrkey]['endpage']]['bm'];
						$dom[$prevtrkey]['endy'] = $pgendy;
						// update row-spanned cells
						if (isset($dom[($dom[$key]['parent'])]['rowspans'])) {
							foreach ($dom[($dom[$key]['parent'])]['rowspans'] as $k => $trwsp) {
								if (($trwsp['trid'] == $prevtrkey) AND ($trwsp['mrowspan'] >= 0) AND ($trwsp['endpage'] == $dom[$prevtrkey]['endpage'])) {
									$dom[($dom[$key]['parent'])]['rowspans'][$k]['endy'] = $pgendy;
									$dom[($dom[$key]['parent'])]['rowspans'][$k]['mrowspan'] = -1;
								}
							}
						}
					}
					$prevtrkey = $trkey;
					$table_el = $dom[($dom[$key]['parent'])];
				}
				// for each row
				if (count($table_el['trids']) > 0) {
					unset($xmax);
				}
				foreach ($table_el['trids'] as $j => $trkey) {
					$parent = $dom[$trkey];
					if (!isset($xmax)) {
						$xmax = $parent['cellpos'][(count($parent['cellpos']) - 1)]['endx'];
					}
					// for each cell on the row
					foreach ($parent['cellpos'] as $k => $cellpos) {
						if (isset($cellpos['rowspanid']) AND ($cellpos['rowspanid'] >= 0)) {
							$cellpos['startx'] = $table_el['rowspans'][($cellpos['rowspanid'])]['startx'];
							$cellpos['endx'] = $table_el['rowspans'][($cellpos['rowspanid'])]['endx'];
							$endy = $table_el['rowspans'][($cellpos['rowspanid'])]['endy'];
							$startpage = $table_el['rowspans'][($cellpos['rowspanid'])]['startpage'];
							$endpage = $table_el['rowspans'][($cellpos['rowspanid'])]['endpage'];
							$startcolumn = $table_el['rowspans'][($cellpos['rowspanid'])]['startcolumn'];
							$endcolumn = $table_el['rowspans'][($cellpos['rowspanid'])]['endcolumn'];
						} else {
							$endy = $parent['endy'];
							$startpage = $parent['startpage'];
							$endpage = $parent['endpage'];
							$startcolumn = $parent['startcolumn'];
							$endcolumn = $parent['endcolumn'];
						}
						if ($this->num_columns == 0) {
							$this->num_columns = 1;
						}
						if (isset($cellpos['border'])) {
							$border = $cellpos['border'];
						}
						if (isset($cellpos['bgcolor']) AND ($cellpos['bgcolor']) !== false) {
							$this->SetFillColorArray($cellpos['bgcolor']);
							$fill = true;
						} else {
							$fill = false;
						}
						$x = $cellpos['startx'];
						$y = $parent['starty'];
						$starty = $y;
						$w = abs($cellpos['endx'] - $cellpos['startx']);
						// get border modes
						$border_start = TCPDF_STATIC::getBorderMode($border, $position='start', $this->opencell);
						$border_end = TCPDF_STATIC::getBorderMode($border, $position='end', $this->opencell);
						$border_middle = TCPDF_STATIC::getBorderMode($border, $position='middle', $this->opencell);
						// design borders around HTML cells.
						for ($page = $startpage; $page <= $endpage; ++$page) { // for each page
							$ccode = '';
							$this->setPage($page);
							if ($this->num_columns < 2) {
								// single-column mode
								$this->x = $x;
								$this->y = $this->tMargin;
							}
							// account for margin changes
							if ($page > $startpage) {
								if (($this->rtl) AND ($this->pagedim[$page]['orm'] != $this->pagedim[$startpage]['orm'])) {
									$this->x -= ($this->pagedim[$page]['orm'] - $this->pagedim[$startpage]['orm']);
								} elseif ((!$this->rtl) AND ($this->pagedim[$page]['olm'] != $this->pagedim[$startpage]['olm'])) {
									$this->x += ($this->pagedim[$page]['olm'] - $this->pagedim[$startpage]['olm']);
								}
							}
							if ($startpage == $endpage) { // single page
								$deltacol = 0;
								$deltath = 0;
								for ($column = $startcolumn; $column <= $endcolumn; ++$column) { // for each column
									$this->selectColumn($column);
									if ($startcolumn == $endcolumn) { // single column
										$cborder = $border;
										$h = $endy - $parent['starty'];
										$this->y = $y;
										$this->x = $x;
									} elseif ($column == $startcolumn) { // first column
										$cborder = $border_start;
										$this->y = $starty;
										$this->x = $x;
										$h = $this->h - $this->y - $this->bMargin;
										if ($this->rtl) {
											$deltacol = $this->x + $this->rMargin - $this->w;
										} else {
											$deltacol = $this->x - $this->lMargin;
										}
									} elseif ($column == $endcolumn) { // end column
										$cborder = $border_end;
										if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
											$this->y = $this->columns[$column]['th']['\''.$page.'\''];
										}
										$this->x += $deltacol;
										$h = $endy - $this->y;
									} else { // middle column
										$cborder = $border_middle;
										if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
											$this->y = $this->columns[$column]['th']['\''.$page.'\''];
										}
										$this->x += $deltacol;
										$h = $this->h - $this->y - $this->bMargin;
									}
									$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
								} // end for each column
							} elseif ($page == $startpage) { // first page
								$deltacol = 0;
								$deltath = 0;
								for ($column = $startcolumn; $column < $this->num_columns; ++$column) { // for each column
									$this->selectColumn($column);
									if ($column == $startcolumn) { // first column
										$cborder = $border_start;
										$this->y = $starty;
										$this->x = $x;
										$h = $this->h - $this->y - $this->bMargin;
										if ($this->rtl) {
											$deltacol = $this->x + $this->rMargin - $this->w;
										} else {
											$deltacol = $this->x - $this->lMargin;
										}
									} else { // middle column
										$cborder = $border_middle;
										if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
											$this->y = $this->columns[$column]['th']['\''.$page.'\''];
										}
										$this->x += $deltacol;
										$h = $this->h - $this->y - $this->bMargin;
									}
									$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
								} // end for each column
							} elseif ($page == $endpage) { // last page
								$deltacol = 0;
								$deltath = 0;
								for ($column = 0; $column <= $endcolumn; ++$column) { // for each column
									$this->selectColumn($column);
									if ($column == $endcolumn) { // end column
										$cborder = $border_end;
										if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
											$this->y = $this->columns[$column]['th']['\''.$page.'\''];
										}
										$this->x += $deltacol;
										$h = $endy - $this->y;
									} else { // middle column
										$cborder = $border_middle;
										if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
											$this->y = $this->columns[$column]['th']['\''.$page.'\''];
										}
										$this->x += $deltacol;
										$h = $this->h - $this->y - $this->bMargin;
									}
									$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
								} // end for each column
							} else { // middle page
								$deltacol = 0;
								$deltath = 0;
								for ($column = 0; $column < $this->num_columns; ++$column) { // for each column
									$this->selectColumn($column);
									$cborder = $border_middle;
									if (isset($this->columns[$column]['th']['\''.$page.'\''])) {
										$this->y = $this->columns[$column]['th']['\''.$page.'\''];
									}
									$this->x += $deltacol;
									$h = $this->h - $this->y - $this->bMargin;
									$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
								} // end for each column
							}
							if (!empty($cborder) OR !empty($fill)) {
								$offsetlen = strlen($ccode);
								// draw border and fill
								if ($this->inxobj) {
									// we are inside an XObject template
									if (end($this->xobjects[$this->xobjid]['transfmrk']) !== false) {
										$pagemarkkey = key($this->xobjects[$this->xobjid]['transfmrk']);
										$pagemark = $this->xobjects[$this->xobjid]['transfmrk'][$pagemarkkey];
										$this->xobjects[$this->xobjid]['transfmrk'][$pagemarkkey] += $offsetlen;
									} else {
										$pagemark = $this->xobjects[$this->xobjid]['intmrk'];
										$this->xobjects[$this->xobjid]['intmrk'] += $offsetlen;
									}
									$pagebuff = $this->xobjects[$this->xobjid]['outdata'];
									$pstart = substr($pagebuff, 0, $pagemark);
									$pend = substr($pagebuff, $pagemark);
									$this->xobjects[$this->xobjid]['outdata'] = $pstart.$ccode.$pend;
								} else {
									// draw border and fill
									if (end($this->transfmrk[$this->page]) !== false) {
										$pagemarkkey = key($this->transfmrk[$this->page]);
										$pagemark = $this->transfmrk[$this->page][$pagemarkkey];
									} elseif ($this->InFooter) {
										$pagemark = $this->footerpos[$this->page];
									} else {
										$pagemark = $this->intmrk[$this->page];
									}
									$pagebuff = $this->getPageBuffer($this->page);
									$pstart = substr($pagebuff, 0, $pagemark);
									$pend = substr($pagebuff, $pagemark);
									$this->setPageBuffer($this->page, $pstart.$ccode.$pend);
								}
							}
						} // end for each page
						// restore default border
						$border = $default_border;
					} // end for each cell on the row
					if (isset($table_el['attribute']['cellspacing'])) {
						$this->y += $this->getHTMLUnitToUnits($table_el['attribute']['cellspacing'], 1, 'px');
					} elseif (isset($table_el['border-spacing'])) {
						$this->y += $table_el['border-spacing']['V'];
					}
					$this->Ln(0, $cell);
					$this->x = $parent['startx'];
					if ($endpage > $startpage) {
						if (($this->rtl) AND ($this->pagedim[$endpage]['orm'] != $this->pagedim[$startpage]['orm'])) {
							$this->x += ($this->pagedim[$endpage]['orm'] - $this->pagedim[$startpage]['orm']);
						} elseif ((!$this->rtl) AND ($this->pagedim[$endpage]['olm'] != $this->pagedim[$startpage]['olm'])) {
							$this->x += ($this->pagedim[$endpage]['olm'] - $this->pagedim[$startpage]['olm']);
						}
					}
				}
				if (!$in_table_head) { // we are not inside a thead section
					$this->cell_padding = $table_el['old_cell_padding'];
					// reset row height
					$this->resetLastH();
					if (($this->page == ($this->numpages - 1)) AND ($this->pageopen[$this->numpages])) {
						$plendiff = ($this->pagelen[$this->numpages] - $this->emptypagemrk[$this->numpages]);
						if (($plendiff > 0) AND ($plendiff < 60)) {
							$pagediff = substr($this->getPageBuffer($this->numpages), $this->emptypagemrk[$this->numpages], $plendiff);
							if (substr($pagediff, 0, 5) == 'BT /F') {
								// the difference is only a font setting
								$plendiff = 0;
							}
						}
						if ($plendiff == 0) {
							// remove last blank page
							$this->deletePage($this->numpages);
						}
					}
					if (isset($this->theadMargins['top'])) {
						// restore top margin
						$this->tMargin = $this->theadMargins['top'];
					}
					if (!isset($table_el['attribute']['nested']) OR ($table_el['attribute']['nested'] != 'true')) {
						// reset main table header
						$this->thead = '';
						$this->theadMargins = array();
						$this->pagedim[$this->page]['tm'] = $this->tMargin;
					}
				}
				$parent = $table_el;
				break;
			}
			case 'a': {
				$this->HREF = '';
				break;
			}
			case 'sup': {
				$this->SetXY($this->GetX(), $this->GetY() + ((0.7 * $parent['fontsize']) / $this->k));
				break;
			}
			case 'sub': {
				$this->SetXY($this->GetX(), $this->GetY() - ((0.3 * $parent['fontsize']) / $this->k));
				break;
			}
			case 'div': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				break;
			}
			case 'blockquote': {
				if ($this->rtl) {
					$this->rMargin -= $this->listindent;
				} else {
					$this->lMargin -= $this->listindent;
				}
				--$this->listindentlevel;
				$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				break;
			}
			case 'p': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				break;
			}
			case 'pre': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				$this->premode = false;
				break;
			}
			case 'dl': {
				--$this->listnum;
				if ($this->listnum <= 0) {
					$this->listnum = 0;
					$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				} else {
					$this->addHTMLVertSpace(0, 0, $cell, false, $lasttag);
				}
				$this->resetLastH();
				break;
			}
			case 'dt': {
				$this->lispacer = '';
				$this->addHTMLVertSpace(0, 0, $cell, false, $lasttag);
				break;
			}
			case 'dd': {
				$this->lispacer = '';
				if ($this->rtl) {
					$this->rMargin -= $this->listindent;
				} else {
					$this->lMargin -= $this->listindent;
				}
				--$this->listindentlevel;
				$this->addHTMLVertSpace(0, 0, $cell, false, $lasttag);
				break;
			}
			case 'ul':
			case 'ol': {
				--$this->listnum;
				$this->lispacer = '';
				if ($this->rtl) {
					$this->rMargin -= $this->listindent;
				} else {
					$this->lMargin -= $this->listindent;
				}
				--$this->listindentlevel;
				if ($this->listnum <= 0) {
					$this->listnum = 0;
					$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				} else {
					$this->addHTMLVertSpace(0, 0, $cell, false, $lasttag);
				}
				$this->resetLastH();
				break;
			}
			case 'li': {
				$this->lispacer = '';
				$this->addHTMLVertSpace(0, 0, $cell, false, $lasttag);
				break;
			}
			case 'h1':
			case 'h2':
			case 'h3':
			case 'h4':
			case 'h5':
			case 'h6': {
				$this->addHTMLVertSpace($hbz, $hb, $cell, false, $lasttag);
				break;
			}
			// Form fields (since 4.8.000 - 2009-09-07)
			case 'form': {
				$this->form_action = '';
				$this->form_enctype = 'application/x-www-form-urlencoded';
				break;
			}
			default : {
				break;
			}
		}
		// draw border and background (if any)
		$this->drawHTMLTagBorder($parent, $xmax);
		if (isset($dom[($dom[$key]['parent'])]['attribute']['pagebreakafter'])) {
			$pba = $dom[($dom[$key]['parent'])]['attribute']['pagebreakafter'];
			// check for pagebreak
			if (($pba == 'true') OR ($pba == 'left') OR ($pba == 'right')) {
				// add a page (or trig AcceptPageBreak() for multicolumn mode)
				$this->checkPageBreak($this->PageBreakTrigger + 1);
			}
			if ((($pba == 'left') AND (((!$this->rtl) AND (($this->page % 2) == 0)) OR (($this->rtl) AND (($this->page % 2) != 0))))
				OR (($pba == 'right') AND (((!$this->rtl) AND (($this->page % 2) != 0)) OR (($this->rtl) AND (($this->page % 2) == 0))))) {
				// add a page (or trig AcceptPageBreak() for multicolumn mode)
				$this->checkPageBreak($this->PageBreakTrigger + 1);
			}
		}
		$this->tmprtl = false;
		return $dom;
	}

	/**
	 * Add vertical spaces if needed.
	 * @param $hbz (string) Distance between current y and line bottom.
	 * @param $hb (string) The height of the break.
	 * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
	 * @param $firsttag (boolean) set to true when the tag is the first.
	 * @param $lasttag (boolean) set to true when the tag is the last.
	 * @protected
	 */
	protected function addHTMLVertSpace($hbz=0, $hb=0, $cell=false, $firsttag=false, $lasttag=false) {
		if ($firsttag) {
			$this->Ln(0, $cell);
			$this->htmlvspace = 0;
			return;
		}
		if ($lasttag) {
			$this->Ln($hbz, $cell);
			$this->htmlvspace = 0;
			return;
		}
		if ($hb < $this->htmlvspace) {
			$hd = 0;
		} else {
			$hd = $hb - $this->htmlvspace;
			$this->htmlvspace = $hb;
		}
		$this->Ln(($hbz + $hd), $cell);
	}

	/**
	 * Return the starting coordinates to draw an html border
	 * @return array containing top-left border coordinates
	 * @protected
	 * @since 5.7.000 (2010-08-03)
	 */
	protected function getBorderStartPosition() {
		if ($this->rtl) {
			$xmax = $this->lMargin;
		} else {
			$xmax = $this->w - $this->rMargin;
		}
		return array('page' => $this->page, 'column' => $this->current_column, 'x' => $this->x, 'y' => $this->y, 'xmax' => $xmax);
	}

	/**
	 * Draw an HTML block border and fill
	 * @param $tag (array) array of tag properties.
	 * @param $xmax (int) end X coordinate for border.
	 * @protected
	 * @since 5.7.000 (2010-08-03)
	 */
	protected function drawHTMLTagBorder($tag, $xmax) {
		if (!isset($tag['borderposition'])) {
			// nothing to draw
			return;
		}
		$prev_x = $this->x;
		$prev_y = $this->y;
		$prev_lasth = $this->lasth;
		$border = 0;
		$fill = false;
		$this->lasth = 0;
		if (isset($tag['border']) AND !empty($tag['border'])) {
			// get border style
			$border = $tag['border'];
			if (!TCPDF_STATIC::empty_string($this->thead) AND (!$this->inthead)) {
				// border for table header
				$border = TCPDF_STATIC::getBorderMode($border, $position='middle', $this->opencell);
			}
		}
		if (isset($tag['bgcolor']) AND ($tag['bgcolor'] !== false)) {
			// get background color
			$old_bgcolor = $this->bgcolor;
			$this->SetFillColorArray($tag['bgcolor']);
			$fill = true;
		}
		if (!$border AND !$fill) {
			// nothing to draw
			return;
		}
		if (isset($tag['attribute']['cellspacing'])) {
			$clsp = $this->getHTMLUnitToUnits($tag['attribute']['cellspacing'], 1, 'px');
			$cellspacing = array('H' => $clsp, 'V' => $clsp);
		} elseif (isset($tag['border-spacing'])) {
			$cellspacing = $tag['border-spacing'];
		} else {
			$cellspacing = array('H' => 0, 'V' => 0);
		}
		if (($tag['value'] != 'table') AND (is_array($border)) AND (!empty($border))) {
			// draw the border externally respect the sqare edge.
			$border['mode'] = 'ext';
		}
		if ($this->rtl) {
			if ($xmax >= $tag['borderposition']['x']) {
				$xmax = $tag['borderposition']['xmax'];
			}
			$w = ($tag['borderposition']['x'] - $xmax);
		} else {
			if ($xmax <= $tag['borderposition']['x']) {
				$xmax = $tag['borderposition']['xmax'];
			}
			$w = ($xmax - $tag['borderposition']['x']);
		}
		if ($w <= 0) {
			return;
		}
		$w += $cellspacing['H'];
		$startpage = $tag['borderposition']['page'];
		$startcolumn = $tag['borderposition']['column'];
		$x = $tag['borderposition']['x'];
		$y = $tag['borderposition']['y'];
		$endpage = $this->page;
		$starty = $tag['borderposition']['y'] - $cellspacing['V'];
		$currentY = $this->y;
		$this->x = $x;
		// get latest column
		$endcolumn = $this->current_column;
		if ($this->num_columns == 0) {
			$this->num_columns = 1;
		}
		// get border modes
		$border_start = TCPDF_STATIC::getBorderMode($border, $position='start', $this->opencell);
		$border_end = TCPDF_STATIC::getBorderMode($border, $position='end', $this->opencell);
		$border_middle = TCPDF_STATIC::getBorderMode($border, $position='middle', $this->opencell);
		// temporary disable page regions
		$temp_page_regions = $this->page_regions;
		$this->page_regions = array();
		// design borders around HTML cells.
		for ($page = $startpage; $page <= $endpage; ++$page) { // for each page
			$ccode = '';
			$this->setPage($page);
			if ($this->num_columns < 2) {
				// single-column mode
				$this->x = $x;
				$this->y = $this->tMargin;
			}
			// account for margin changes
			if ($page > $startpage) {
				if (($this->rtl) AND ($this->pagedim[$page]['orm'] != $this->pagedim[$startpage]['orm'])) {
					$this->x -= ($this->pagedim[$page]['orm'] - $this->pagedim[$startpage]['orm']);
				} elseif ((!$this->rtl) AND ($this->pagedim[$page]['olm'] != $this->pagedim[$startpage]['olm'])) {
					$this->x += ($this->pagedim[$page]['olm'] - $this->pagedim[$startpage]['olm']);
				}
			}
			if ($startpage == $endpage) {
				// single page
				for ($column = $startcolumn; $column <= $endcolumn; ++$column) { // for each column
					$this->selectColumn($column);
					if ($startcolumn == $endcolumn) { // single column
						$cborder = $border;
						$h = ($currentY - $y) + $cellspacing['V'];
						$this->y = $starty;
					} elseif ($column == $startcolumn) { // first column
						$cborder = $border_start;
						$this->y = $starty;
						$h = $this->h - $this->y - $this->bMargin;
					} elseif ($column == $endcolumn) { // end column
						$cborder = $border_end;
						$h = $currentY - $this->y;
					} else { // middle column
						$cborder = $border_middle;
						$h = $this->h - $this->y - $this->bMargin;
					}
					$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
				} // end for each column
			} elseif ($page == $startpage) { // first page
				for ($column = $startcolumn; $column < $this->num_columns; ++$column) { // for each column
					$this->selectColumn($column);
					if ($column == $startcolumn) { // first column
						$cborder = $border_start;
						$this->y = $starty;
						$h = $this->h - $this->y - $this->bMargin;
					} else { // middle column
						$cborder = $border_middle;
						$h = $this->h - $this->y - $this->bMargin;
					}
					$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
				} // end for each column
			} elseif ($page == $endpage) { // last page
				for ($column = 0; $column <= $endcolumn; ++$column) { // for each column
					$this->selectColumn($column);
					if ($column == $endcolumn) {
						// end column
						$cborder = $border_end;
						$h = $currentY - $this->y;
					} else {
						// middle column
						$cborder = $border_middle;
						$h = $this->h - $this->y - $this->bMargin;
					}
					$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
				} // end for each column
			} else { // middle page
				for ($column = 0; $column < $this->num_columns; ++$column) { // for each column
					$this->selectColumn($column);
					$cborder = $border_middle;
					$h = $this->h - $this->y - $this->bMargin;
					$ccode .= $this->getCellCode($w, $h, '', $cborder, 1, '', $fill, '', 0, true)."\n";
				} // end for each column
			}
			if ($cborder OR $fill) {
				$offsetlen = strlen($ccode);
				// draw border and fill
				if ($this->inxobj) {
					// we are inside an XObject template
					if (end($this->xobjects[$this->xobjid]['transfmrk']) !== false) {
						$pagemarkkey = key($this->xobjects[$this->xobjid]['transfmrk']);
						$pagemark = $this->xobjects[$this->xobjid]['transfmrk'][$pagemarkkey];
						$this->xobjects[$this->xobjid]['transfmrk'][$pagemarkkey] += $offsetlen;
					} else {
						$pagemark = $this->xobjects[$this->xobjid]['intmrk'];
						$this->xobjects[$this->xobjid]['intmrk'] += $offsetlen;
					}
					$pagebuff = $this->xobjects[$this->xobjid]['outdata'];
					$pstart = substr($pagebuff, 0, $pagemark);
					$pend = substr($pagebuff, $pagemark);
					$this->xobjects[$this->xobjid]['outdata'] = $pstart.$ccode.$pend;
				} else {
					if (end($this->transfmrk[$this->page]) !== false) {
						$pagemarkkey = key($this->transfmrk[$this->page]);
						$pagemark = $this->transfmrk[$this->page][$pagemarkkey];
					} elseif ($this->InFooter) {
						$pagemark = $this->footerpos[$this->page];
					} else {
						$pagemark = $this->intmrk[$this->page];
					}
					$pagebuff = $this->getPageBuffer($this->page);
					$pstart = substr($pagebuff, 0, $pagemark);
					$pend = substr($pagebuff, $pagemark);
					$this->setPageBuffer($this->page, $pstart.$ccode.$pend);
					$this->bordermrk[$this->page] += $offsetlen;
					$this->cntmrk[$this->page] += $offsetlen;
				}
			}
		} // end for each page
		// restore page regions
		$this->page_regions = $temp_page_regions;
		if (isset($old_bgcolor)) {
			// restore background color
			$this->SetFillColorArray($old_bgcolor);
		}
		// restore pointer position
		$this->x = $prev_x;
		$this->y = $prev_y;
		$this->lasth = $prev_lasth;
	}

	/**
	 * Set the default bullet to be used as LI bullet symbol
	 * @param $symbol (string) character or string to be used (legal values are: '' = automatic, '!' = auto bullet, '#' = auto numbering, 'disc', 'disc', 'circle', 'square', '1', 'decimal', 'decimal-leading-zero', 'i', 'lower-roman', 'I', 'upper-roman', 'a', 'lower-alpha', 'lower-latin', 'A', 'upper-alpha', 'upper-latin', 'lower-greek', 'img|type|width|height|image.ext')
	 * @public
	 * @since 4.0.028 (2008-09-26)
	 */
	public function setLIsymbol($symbol='!') {
		// check for custom image symbol
		if (substr($symbol, 0, 4) == 'img|') {
			$this->lisymbol = $symbol;
			return;
		}
		$symbol = strtolower($symbol);
		$valid_symbols = array('!', '#', 'disc', 'circle', 'square', '1', 'decimal', 'decimal-leading-zero', 'i', 'lower-roman', 'I', 'upper-roman', 'a', 'lower-alpha', 'lower-latin', 'A', 'upper-alpha', 'upper-latin', 'lower-greek');
		if (in_array($symbol, $valid_symbols)) {
			$this->lisymbol = $symbol;
		} else {
			$this->lisymbol = '';
		}
	}

	/**
	 * Set the booklet mode for double-sided pages.
	 * @param $booklet (boolean) true set the booklet mode on, false otherwise.
	 * @param $inner (float) Inner page margin.
	 * @param $outer (float) Outer page margin.
	 * @public
	 * @since 4.2.000 (2008-10-29)
	 */
	public function SetBooklet($booklet=true, $inner=-1, $outer=-1) {
		$this->booklet = $booklet;
		if ($inner >= 0) {
			$this->lMargin = $inner;
		}
		if ($outer >= 0) {
			$this->rMargin = $outer;
		}
	}

	/**
	 * Swap the left and right margins.
	 * @param $reverse (boolean) if true swap left and right margins.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected function swapMargins($reverse=true) {
		if ($reverse) {
			// swap left and right margins
			$mtemp = $this->original_lMargin;
			$this->original_lMargin = $this->original_rMargin;
			$this->original_rMargin = $mtemp;
			$deltam = $this->original_lMargin - $this->original_rMargin;
			$this->lMargin += $deltam;
			$this->rMargin -= $deltam;
		}
	}

	/**
	 * Set the vertical spaces for HTML tags.
	 * The array must have the following structure (example):
	 * $tagvs = array('h1' => array(0 => array('h' => '', 'n' => 2), 1 => array('h' => 1.3, 'n' => 1)));
	 * The first array level contains the tag names,
	 * the second level contains 0 for opening tags or 1 for closing tags,
	 * the third level contains the vertical space unit (h) and the number spaces to add (n).
	 * If the h parameter is not specified, default values are used.
	 * @param $tagvs (array) array of tags and relative vertical spaces.
	 * @public
	 * @since 4.2.001 (2008-10-30)
	 */
	public function setHtmlVSpace($tagvs) {
		$this->tagvspaces = $tagvs;
	}

	/**
	 * Set custom width for list indentation.
	 * @param $width (float) width of the indentation. Use negative value to disable it.
	 * @public
	 * @since 4.2.007 (2008-11-12)
	 */
	public function setListIndentWidth($width) {
		return $this->customlistindent = floatval($width);
	}

	/**
	 * Set the top/bottom cell sides to be open or closed when the cell cross the page.
	 * @param $isopen (boolean) if true keeps the top/bottom border open for the cell sides that cross the page.
	 * @public
	 * @since 4.2.010 (2008-11-14)
	 */
	public function setOpenCell($isopen) {
		$this->opencell = $isopen;
	}

	/**
	 * Set the color and font style for HTML links.
	 * @param $color (array) RGB array of colors
	 * @param $fontstyle (string) additional font styles to add
	 * @public
	 * @since 4.4.003 (2008-12-09)
	 */
	public function setHtmlLinksStyle($color=array(0,0,255), $fontstyle='U') {
		$this->htmlLinkColorArray = $color;
		$this->htmlLinkFontStyle = $fontstyle;
	}

	/**
	 * Convert HTML string containing value and unit of measure to user's units or points.
	 * @param $htmlval (string) String containing values and unit.
	 * @param $refsize (string) Reference value in points.
	 * @param $defaultunit (string) Default unit (can be one of the following: %, em, ex, px, in, mm, pc, pt).
	 * @param $points (boolean) If true returns points, otherwise returns value in user's units.
	 * @return float value in user's unit or point if $points=true
	 * @public
	 * @since 4.4.004 (2008-12-10)
	 */
	public function getHTMLUnitToUnits($htmlval, $refsize=1, $defaultunit='px', $points=false) {
		$supportedunits = array('%', 'em', 'ex', 'px', 'in', 'cm', 'mm', 'pc', 'pt');
		$retval = 0;
		$value = 0;
		$unit = 'px';
		if ($points) {
			$k = 1;
		} else {
			$k = $this->k;
		}
		if (in_array($defaultunit, $supportedunits)) {
			$unit = $defaultunit;
		}
		if (is_numeric($htmlval)) {
			$value = floatval($htmlval);
		} elseif (preg_match('/([0-9\.\-\+]+)/', $htmlval, $mnum)) {
			$value = floatval($mnum[1]);
			if (preg_match('/([a-z%]+)/', $htmlval, $munit)) {
				if (in_array($munit[1], $supportedunits)) {
					$unit = $munit[1];
				}
			}
		}
		switch ($unit) {
			// percentage
			case '%': {
				$retval = (($value * $refsize) / 100);
				break;
			}
			// relative-size
			case 'em': {
				$retval = ($value * $refsize);
				break;
			}
			// height of lower case 'x' (about half the font-size)
			case 'ex': {
				$retval = ($value * ($refsize / 2));
				break;
			}
			// absolute-size
			case 'in': {
				$retval = (($value * $this->dpi) / $k);
				break;
			}
			// centimeters
			case 'cm': {
				$retval = (($value / 2.54 * $this->dpi) / $k);
				break;
			}
			// millimeters
			case 'mm': {
				$retval = (($value / 25.4 * $this->dpi) / $k);
				break;
			}
			// one pica is 12 points
			case 'pc': {
				$retval = (($value * 12) / $k);
				break;
			}
			// points
			case 'pt': {
				$retval = ($value / $k);
				break;
			}
			// pixels
			case 'px': {
				$retval = $this->pixelsToUnits($value);
				if ($points) {
					$retval *= $this->k;
				}
				break;
			}
		}
		return $retval;
	}

	/**
	 * Output an HTML list bullet or ordered item symbol
	 * @param $listdepth (int) list nesting level
	 * @param $listtype (string) type of list
	 * @param $size (float) current font size
	 * @protected
	 * @since 4.4.004 (2008-12-10)
	 */
	protected function putHtmlListBullet($listdepth, $listtype='', $size=10) {
		if ($this->state != 2) {
			return;
		}
		$size /= $this->k;
		$fill = '';
		$bgcolor = $this->bgcolor;
		$color = $this->fgcolor;
		$strokecolor = $this->strokecolor;
		$width = 0;
		$textitem = '';
		$tmpx = $this->x;
		$lspace = $this->GetStringWidth('  ');
		if ($listtype == '^') {
			// special symbol used for avoid justification of rect bullet
			$this->lispacer = '';
			return;
		} elseif ($listtype == '!') {
			// set default list type for unordered list
			$deftypes = array('disc', 'circle', 'square');
			$listtype = $deftypes[($listdepth - 1) % 3];
		} elseif ($listtype == '#') {
			// set default list type for ordered list
			$listtype = 'decimal';
		} elseif (substr($listtype, 0, 4) == 'img|') {
			// custom image type ('img|type|width|height|image.ext')
			$img = explode('|', $listtype);
			$listtype = 'img';
		}
		switch ($listtype) {
			// unordered types
			case 'none': {
				break;
			}
			case 'disc': {
				$r = $size / 6;
				$lspace += (2 * $r);
				if ($this->rtl) {
					$this->x += $lspace;
				} else {
					$this->x -= $lspace;
				}
				$this->Circle(($this->x + $r), ($this->y + ($this->lasth / 2)), $r, 0, 360, 'F', array(), $color, 8);
				break;
			}
			case 'circle': {
				$r = $size / 6;
				$lspace += (2 * $r);
				if ($this->rtl) {
					$this->x += $lspace;
				} else {
					$this->x -= $lspace;
				}
				$prev_line_style = $this->linestyleWidth.' '.$this->linestyleCap.' '.$this->linestyleJoin.' '.$this->linestyleDash.' '.$this->DrawColor;
				$new_line_style = array('width' => ($r / 3), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'phase' => 0, 'color'=>$color);
				$this->Circle(($this->x + $r), ($this->y + ($this->lasth / 2)), ($r * (1 - (1/6))), 0, 360, 'D', $new_line_style, array(), 8);
				$this->_out($prev_line_style); // restore line settings
				break;
			}
			case 'square': {
				$l = $size / 3;
				$lspace += $l;
				if ($this->rtl) {;
					$this->x += $lspace;
				} else {
					$this->x -= $lspace;
				}
				$this->Rect($this->x, ($this->y + (($this->lasth - $l) / 2)), $l, $l, 'F', array(), $color);
				break;
			}
			case 'img': {
				// 1=>type, 2=>width, 3=>height, 4=>image.ext
				$lspace += $img[2];
				if ($this->rtl) {;
					$this->x += $lspace;
				} else {
					$this->x -= $lspace;
				}
				$imgtype = strtolower($img[1]);
				$prev_y = $this->y;
				switch ($imgtype) {
					case 'svg': {
						$this->ImageSVG($img[4], $this->x, ($this->y + (($this->lasth - $img[3]) / 2)), $img[2], $img[3], '', 'T', '', 0, false);
						break;
					}
					case 'ai':
					case 'eps': {
						$this->ImageEps($img[4], $this->x, ($this->y + (($this->lasth - $img[3]) / 2)), $img[2], $img[3], '', true, 'T', '', 0, false);
						break;
					}
					default: {
						$this->Image($img[4], $this->x, ($this->y + (($this->lasth - $img[3]) / 2)), $img[2], $img[3], $img[1], '', 'T', false, 300, '', false, false, 0, false, false, false);
						break;
					}
				}
				$this->y = $prev_y;
				break;
			}
			// ordered types
			// $this->listcount[$this->listnum];
			// $textitem
			case '1':
			case 'decimal': {
				$textitem = $this->listcount[$this->listnum];
				break;
			}
			case 'decimal-leading-zero': {
				$textitem = sprintf('%02d', $this->listcount[$this->listnum]);
				break;
			}
			case 'i':
			case 'lower-roman': {
				$textitem = strtolower(TCPDF_STATIC::intToRoman($this->listcount[$this->listnum]));
				break;
			}
			case 'I':
			case 'upper-roman': {
				$textitem = TCPDF_STATIC::intToRoman($this->listcount[$this->listnum]);
				break;
			}
			case 'a':
			case 'lower-alpha':
			case 'lower-latin': {
				$textitem = chr(97 + $this->listcount[$this->listnum] - 1);
				break;
			}
			case 'A':
			case 'upper-alpha':
			case 'upper-latin': {
				$textitem = chr(65 + $this->listcount[$this->listnum] - 1);
				break;
			}
			case 'lower-greek': {
				$textitem = TCPDF_FONTS::unichr((945 + $this->listcount[$this->listnum] - 1), $this->isunicode);
				break;
			}
			/*
			// Types to be implemented (special handling)
			case 'hebrew': {
				break;
			}
			case 'armenian': {
				break;
			}
			case 'georgian': {
				break;
			}
			case 'cjk-ideographic': {
				break;
			}
			case 'hiragana': {
				break;
			}
			case 'katakana': {
				break;
			}
			case 'hiragana-iroha': {
				break;
			}
			case 'katakana-iroha': {
				break;
			}
			*/
			default: {
				$textitem = $this->listcount[$this->listnum];
			}
		}
		if (!TCPDF_STATIC::empty_string($textitem)) {
			// Check whether we need a new page or new column
			$prev_y = $this->y;
			$h = $this->getCellHeight($this->FontSize);
			if ($this->checkPageBreak($h) OR ($this->y < $prev_y)) {
				$tmpx = $this->x;
			}
			// print ordered item
			if ($this->rtl) {
				$textitem = '.'.$textitem;
			} else {
				$textitem = $textitem.'.';
			}
			$lspace += $this->GetStringWidth($textitem);
			if ($this->rtl) {
				$this->x += $lspace;
			} else {
				$this->x -= $lspace;
			}
			$this->Write($this->lasth, $textitem, '', false, '', false, 0, false);
		}
		$this->x = $tmpx;
		$this->lispacer = '^';
		// restore colors
		$this->SetFillColorArray($bgcolor);
		$this->SetDrawColorArray($strokecolor);
		$this->SettextColorArray($color);
	}

	/**
	 * Returns current graphic variables as array.
	 * @return array of graphic variables
	 * @protected
	 * @since 4.2.010 (2008-11-14)
	 */
	protected function getGraphicVars() {
		$grapvars = array(
			'FontFamily' => $this->FontFamily,
			'FontStyle' => $this->FontStyle,
			'FontSizePt' => $this->FontSizePt,
			'rMargin' => $this->rMargin,
			'lMargin' => $this->lMargin,
			'cell_padding' => $this->cell_padding,
			'cell_margin' => $this->cell_margin,
			'LineWidth' => $this->LineWidth,
			'linestyleWidth' => $this->linestyleWidth,
			'linestyleCap' => $this->linestyleCap,
			'linestyleJoin' => $this->linestyleJoin,
			'linestyleDash' => $this->linestyleDash,
			'textrendermode' => $this->textrendermode,
			'textstrokewidth' => $this->textstrokewidth,
			'DrawColor' => $this->DrawColor,
			'FillColor' => $this->FillColor,
			'TextColor' => $this->TextColor,
			'ColorFlag' => $this->ColorFlag,
			'bgcolor' => $this->bgcolor,
			'fgcolor' => $this->fgcolor,
			'htmlvspace' => $this->htmlvspace,
			'listindent' => $this->listindent,
			'listindentlevel' => $this->listindentlevel,
			'listnum' => $this->listnum,
			'listordered' => $this->listordered,
			'listcount' => $this->listcount,
			'lispacer' => $this->lispacer,
			'cell_height_ratio' => $this->cell_height_ratio,
			'font_stretching' => $this->font_stretching,
			'font_spacing' => $this->font_spacing,
			'alpha' => $this->alpha,
			// extended
			'lasth' => $this->lasth,
			'tMargin' => $this->tMargin,
			'bMargin' => $this->bMargin,
			'AutoPageBreak' => $this->AutoPageBreak,
			'PageBreakTrigger' => $this->PageBreakTrigger,
			'x' => $this->x,
			'y' => $this->y,
			'w' => $this->w,
			'h' => $this->h,
			'wPt' => $this->wPt,
			'hPt' => $this->hPt,
			'fwPt' => $this->fwPt,
			'fhPt' => $this->fhPt,
			'page' => $this->page,
			'current_column' => $this->current_column,
			'num_columns' => $this->num_columns
			);
		return $grapvars;
	}

	/**
	 * Set graphic variables.
	 * @param $gvars (array) array of graphic variablesto restore
	 * @param $extended (boolean) if true restore extended graphic variables
	 * @protected
	 * @since 4.2.010 (2008-11-14)
	 */
	protected function setGraphicVars($gvars, $extended=false) {
		if ($this->state != 2) {
			 return;
		}
		$this->FontFamily = $gvars['FontFamily'];
		$this->FontStyle = $gvars['FontStyle'];
		$this->FontSizePt = $gvars['FontSizePt'];
		$this->rMargin = $gvars['rMargin'];
		$this->lMargin = $gvars['lMargin'];
		$this->cell_padding = $gvars['cell_padding'];
		$this->cell_margin = $gvars['cell_margin'];
		$this->LineWidth = $gvars['LineWidth'];
		$this->linestyleWidth = $gvars['linestyleWidth'];
		$this->linestyleCap = $gvars['linestyleCap'];
		$this->linestyleJoin = $gvars['linestyleJoin'];
		$this->linestyleDash = $gvars['linestyleDash'];
		$this->textrendermode = $gvars['textrendermode'];
		$this->textstrokewidth = $gvars['textstrokewidth'];
		$this->DrawColor = $gvars['DrawColor'];
		$this->FillColor = $gvars['FillColor'];
		$this->TextColor = $gvars['TextColor'];
		$this->ColorFlag = $gvars['ColorFlag'];
		$this->bgcolor = $gvars['bgcolor'];
		$this->fgcolor = $gvars['fgcolor'];
		$this->htmlvspace = $gvars['htmlvspace'];
		$this->listindent = $gvars['listindent'];
		$this->listindentlevel = $gvars['listindentlevel'];
		$this->listnum = $gvars['listnum'];
		$this->listordered = $gvars['listordered'];
		$this->listcount = $gvars['listcount'];
		$this->lispacer = $gvars['lispacer'];
		$this->cell_height_ratio = $gvars['cell_height_ratio'];
		$this->font_stretching = $gvars['font_stretching'];
		$this->font_spacing = $gvars['font_spacing'];
		$this->alpha = $gvars['alpha'];
		if ($extended) {
			// restore extended values
			$this->lasth = $gvars['lasth'];
			$this->tMargin = $gvars['tMargin'];
			$this->bMargin = $gvars['bMargin'];
			$this->AutoPageBreak = $gvars['AutoPageBreak'];
			$this->PageBreakTrigger = $gvars['PageBreakTrigger'];
			$this->x = $gvars['x'];
			$this->y = $gvars['y'];
			$this->w = $gvars['w'];
			$this->h = $gvars['h'];
			$this->wPt = $gvars['wPt'];
			$this->hPt = $gvars['hPt'];
			$this->fwPt = $gvars['fwPt'];
			$this->fhPt = $gvars['fhPt'];
			$this->page = $gvars['page'];
			$this->current_column = $gvars['current_column'];
			$this->num_columns = $gvars['num_columns'];
		}
		$this->_out(''.$this->linestyleWidth.' '.$this->linestyleCap.' '.$this->linestyleJoin.' '.$this->linestyleDash.' '.$this->DrawColor.' '.$this->FillColor.'');
		if (!TCPDF_STATIC::empty_string($this->FontFamily)) {
			$this->SetFont($this->FontFamily, $this->FontStyle, $this->FontSizePt);
		}
	}

	/**
	 * Outputs the "save graphics state" operator 'q'
	 * @protected
	 */
	protected function _outSaveGraphicsState() {
		$this->_out('q');
	}

	/**
	 * Outputs the "restore graphics state" operator 'Q'
	 * @protected
	 */
	protected function _outRestoreGraphicsState() {
		$this->_out('Q');
	}

	/**
	 * Set buffer content (always append data).
	 * @param $data (string) data
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected function setBuffer($data) {
		$this->bufferlen += strlen($data);
		$this->buffer .= $data;
	}

	/**
	 * Replace the buffer content
	 * @param $data (string) data
	 * @protected
	 * @since 5.5.000 (2010-06-22)
	 */
	protected function replaceBuffer($data) {
		$this->bufferlen = strlen($data);
		$this->buffer = $data;
	}

	/**
	 * Get buffer content.
	 * @return string buffer content
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected function getBuffer() {
		return $this->buffer;
	}

	/**
	 * Set page buffer content.
	 * @param $page (int) page number
	 * @param $data (string) page data
	 * @param $append (boolean) if true append data, false replace.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected function setPageBuffer($page, $data, $append=false) {
		if ($append) {
			$this->pages[$page] .= $data;
		} else {
			$this->pages[$page] = $data;
		}
		if ($append AND isset($this->pagelen[$page])) {
			$this->pagelen[$page] += strlen($data);
		} else {
			$this->pagelen[$page] = strlen($data);
		}
	}

	/**
	 * Get page buffer content.
	 * @param $page (int) page number
	 * @return string page buffer content or false in case of error
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected function getPageBuffer($page) {
		if (isset($this->pages[$page])) {
			return $this->pages[$page];
		}
		return false;
	}

	/**
	 * Set image buffer content.
	 * @param $image (string) image key
	 * @param $data (array) image data
	 * @return int image index number
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected function setImageBuffer($image, $data) {
		if (($data['i'] = array_search($image, $this->imagekeys)) === FALSE) {
			$this->imagekeys[$this->numimages] = $image;
			$data['i'] = $this->numimages;
			++$this->numimages;
		}
		$this->images[$image] = $data;
		return $data['i'];
	}

	/**
	 * Set image buffer content for a specified sub-key.
	 * @param $image (string) image key
	 * @param $key (string) image sub-key
	 * @param $data (array) image data
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected function setImageSubBuffer($image, $key, $data) {
		if (!isset($this->images[$image])) {
			$this->setImageBuffer($image, array());
		}
		$this->images[$image][$key] = $data;
	}

	/**
	 * Get image buffer content.
	 * @param $image (string) image key
	 * @return string image buffer content or false in case of error
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected function getImageBuffer($image) {
		if (isset($this->images[$image])) {
			return $this->images[$image];
		}
		return false;
	}

	/**
	 * Set font buffer content.
	 * @param $font (string) font key
	 * @param $data (array) font data
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected function setFontBuffer($font, $data) {
		$this->fonts[$font] = $data;
		if (!in_array($font, $this->fontkeys)) {
			$this->fontkeys[] = $font;
			// store object ID for current font
			++$this->n;
			$this->font_obj_ids[$font] = $this->n;
			$this->setFontSubBuffer($font, 'n', $this->n);
		}
	}

	/**
	 * Set font buffer content.
	 * @param $font (string) font key
	 * @param $key (string) font sub-key
	 * @param $data (array) font data
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected function setFontSubBuffer($font, $key, $data) {
		if (!isset($this->fonts[$font])) {
			$this->setFontBuffer($font, array());
		}
		$this->fonts[$font][$key] = $data;
	}

	/**
	 * Get font buffer content.
	 * @param $font (string) font key
	 * @return string font buffer content or false in case of error
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected function getFontBuffer($font) {
		if (isset($this->fonts[$font])) {
			return $this->fonts[$font];
		}
		return false;
	}

	/**
	 * Move a page to a previous position.
	 * @param $frompage (int) number of the source page
	 * @param $topage (int) number of the destination page (must be less than $frompage)
	 * @return true in case of success, false in case of error.
	 * @public
	 * @since 4.5.000 (2009-01-02)
	 */
	public function movePage($frompage, $topage) {
		if (($frompage > $this->numpages) OR ($frompage <= $topage)) {
			return false;
		}
		if ($frompage == $this->page) {
			// close the page before moving it
			$this->endPage();
		}
		// move all page-related states
		$tmppage = $this->getPageBuffer($frompage);
		$tmppagedim = $this->pagedim[$frompage];
		$tmppagelen = $this->pagelen[$frompage];
		$tmpintmrk = $this->intmrk[$frompage];
		$tmpbordermrk = $this->bordermrk[$frompage];
		$tmpcntmrk = $this->cntmrk[$frompage];
		$tmppageobjects = $this->pageobjects[$frompage];
		if (isset($this->footerpos[$frompage])) {
			$tmpfooterpos = $this->footerpos[$frompage];
		}
		if (isset($this->footerlen[$frompage])) {
			$tmpfooterlen = $this->footerlen[$frompage];
		}
		if (isset($this->transfmrk[$frompage])) {
			$tmptransfmrk = $this->transfmrk[$frompage];
		}
		if (isset($this->PageAnnots[$frompage])) {
			$tmpannots = $this->PageAnnots[$frompage];
		}
		if (isset($this->newpagegroup) AND !empty($this->newpagegroup)) {
			for ($i = $frompage; $i > $topage; --$i) {
				if (isset($this->newpagegroup[$i]) AND (($i + $this->pagegroups[$this->newpagegroup[$i]]) > $frompage)) {
					--$this->pagegroups[$this->newpagegroup[$i]];
					break;
				}
			}
			for ($i = $topage; $i > 0; --$i) {
				if (isset($this->newpagegroup[$i]) AND (($i + $this->pagegroups[$this->newpagegroup[$i]]) > $topage)) {
					++$this->pagegroups[$this->newpagegroup[$i]];
					break;
				}
			}
		}
		for ($i = $frompage; $i > $topage; --$i) {
			$j = $i - 1;
			// shift pages down
			$this->setPageBuffer($i, $this->getPageBuffer($j));
			$this->pagedim[$i] = $this->pagedim[$j];
			$this->pagelen[$i] = $this->pagelen[$j];
			$this->intmrk[$i] = $this->intmrk[$j];
			$this->bordermrk[$i] = $this->bordermrk[$j];
			$this->cntmrk[$i] = $this->cntmrk[$j];
			$this->pageobjects[$i] = $this->pageobjects[$j];
			if (isset($this->footerpos[$j])) {
				$this->footerpos[$i] = $this->footerpos[$j];
			} elseif (isset($this->footerpos[$i])) {
				unset($this->footerpos[$i]);
			}
			if (isset($this->footerlen[$j])) {
				$this->footerlen[$i] = $this->footerlen[$j];
			} elseif (isset($this->footerlen[$i])) {
				unset($this->footerlen[$i]);
			}
			if (isset($this->transfmrk[$j])) {
				$this->transfmrk[$i] = $this->transfmrk[$j];
			} elseif (isset($this->transfmrk[$i])) {
				unset($this->transfmrk[$i]);
			}
			if (isset($this->PageAnnots[$j])) {
				$this->PageAnnots[$i] = $this->PageAnnots[$j];
			} elseif (isset($this->PageAnnots[$i])) {
				unset($this->PageAnnots[$i]);
			}
			if (isset($this->newpagegroup[$j])) {
				$this->newpagegroup[$i] = $this->newpagegroup[$j];
				unset($this->newpagegroup[$j]);
			}
			if ($this->currpagegroup == $j) {
				$this->currpagegroup = $i;
			}
		}
		$this->setPageBuffer($topage, $tmppage);
		$this->pagedim[$topage] = $tmppagedim;
		$this->pagelen[$topage] = $tmppagelen;
		$this->intmrk[$topage] = $tmpintmrk;
		$this->bordermrk[$topage] = $tmpbordermrk;
		$this->cntmrk[$topage] = $tmpcntmrk;
		$this->pageobjects[$topage] = $tmppageobjects;
		if (isset($tmpfooterpos)) {
			$this->footerpos[$topage] = $tmpfooterpos;
		} elseif (isset($this->footerpos[$topage])) {
			unset($this->footerpos[$topage]);
		}
		if (isset($tmpfooterlen)) {
			$this->footerlen[$topage] = $tmpfooterlen;
		} elseif (isset($this->footerlen[$topage])) {
			unset($this->footerlen[$topage]);
		}
		if (isset($tmptransfmrk)) {
			$this->transfmrk[$topage] = $tmptransfmrk;
		} elseif (isset($this->transfmrk[$topage])) {
			unset($this->transfmrk[$topage]);
		}
		if (isset($tmpannots)) {
			$this->PageAnnots[$topage] = $tmpannots;
		} elseif (isset($this->PageAnnots[$topage])) {
			unset($this->PageAnnots[$topage]);
		}
		// adjust outlines
		$tmpoutlines = $this->outlines;
		foreach ($tmpoutlines as $key => $outline) {
			if (!$outline['f']) {
				if (($outline['p'] >= $topage) AND ($outline['p'] < $frompage)) {
					$this->outlines[$key]['p'] = ($outline['p'] + 1);
				} elseif ($outline['p'] == $frompage) {
					$this->outlines[$key]['p'] = $topage;
				}
			}
		}
		// adjust dests
		$tmpdests = $this->dests;
		foreach ($tmpdests as $key => $dest) {
			if (!$dest['f']) {
				if (($dest['p'] >= $topage) AND ($dest['p'] < $frompage)) {
					$this->dests[$key]['p'] = ($dest['p'] + 1);
				} elseif ($dest['p'] == $frompage) {
					$this->dests[$key]['p'] = $topage;
				}
			}
		}
		// adjust links
		$tmplinks = $this->links;
		foreach ($tmplinks as $key => $link) {
			if (!$link['f']) {
				if (($link['p'] >= $topage) AND ($link['p'] < $frompage)) {
					$this->links[$key]['p'] = ($link['p'] + 1);
				} elseif ($link['p'] == $frompage) {
					$this->links[$key]['p'] = $topage;
				}
			}
		}
		// adjust javascript
		$jfrompage = $frompage;
		$jtopage = $topage;
		if (preg_match_all('/this\.addField\(\'([^\']*)\',\'([^\']*)\',([0-9]+)/', $this->javascript, $pamatch) > 0) {
			foreach($pamatch[0] as $pk => $pmatch) {
				$pagenum = intval($pamatch[3][$pk]) + 1;
				if (($pagenum >= $jtopage) AND ($pagenum < $jfrompage)) {
					$newpage = ($pagenum + 1);
				} elseif ($pagenum == $jfrompage) {
					$newpage = $jtopage;
				} else {
					$newpage = $pagenum;
				}
				--$newpage;
				$newjs = "this.addField(\'".$pamatch[1][$pk]."\',\'".$pamatch[2][$pk]."\',".$newpage;
				$this->javascript = str_replace($pmatch, $newjs, $this->javascript);
			}
			unset($pamatch);
		}
		// return to last page
		$this->lastPage(true);
		return true;
	}

	/**
	 * Remove the specified page.
	 * @param $page (int) page to remove
	 * @return true in case of success, false in case of error.
	 * @public
	 * @since 4.6.004 (2009-04-23)
	 */
	public function deletePage($page) {
		if (($page < 1) OR ($page > $this->numpages)) {
			return false;
		}
		// delete current page
		unset($this->pages[$page]);
		unset($this->pagedim[$page]);
		unset($this->pagelen[$page]);
		unset($this->intmrk[$page]);
		unset($this->bordermrk[$page]);
		unset($this->cntmrk[$page]);
		foreach ($this->pageobjects[$page] as $oid) {
			if (isset($this->offsets[$oid])){
				unset($this->offsets[$oid]);
			}
		}
		unset($this->pageobjects[$page]);
		if (isset($this->footerpos[$page])) {
			unset($this->footerpos[$page]);
		}
		if (isset($this->footerlen[$page])) {
			unset($this->footerlen[$page]);
		}
		if (isset($this->transfmrk[$page])) {
			unset($this->transfmrk[$page]);
		}
		if (isset($this->PageAnnots[$page])) {
			unset($this->PageAnnots[$page]);
		}
		if (isset($this->newpagegroup) AND !empty($this->newpagegroup)) {
			for ($i = $page; $i > 0; --$i) {
				if (isset($this->newpagegroup[$i]) AND (($i + $this->pagegroups[$this->newpagegroup[$i]]) > $page)) {
					--$this->pagegroups[$this->newpagegroup[$i]];
					break;
				}
			}
		}
		if (isset($this->pageopen[$page])) {
			unset($this->pageopen[$page]);
		}
		if ($page < $this->numpages) {
			// update remaining pages
			for ($i = $page; $i < $this->numpages; ++$i) {
				$j = $i + 1;
				// shift pages
				$this->setPageBuffer($i, $this->getPageBuffer($j));
				$this->pagedim[$i] = $this->pagedim[$j];
				$this->pagelen[$i] = $this->pagelen[$j];
				$this->intmrk[$i] = $this->intmrk[$j];
				$this->bordermrk[$i] = $this->bordermrk[$j];
				$this->cntmrk[$i] = $this->cntmrk[$j];
				$this->pageobjects[$i] = $this->pageobjects[$j];
				if (isset($this->footerpos[$j])) {
					$this->footerpos[$i] = $this->footerpos[$j];
				} elseif (isset($this->footerpos[$i])) {
					unset($this->footerpos[$i]);
				}
				if (isset($this->footerlen[$j])) {
					$this->footerlen[$i] = $this->footerlen[$j];
				} elseif (isset($this->footerlen[$i])) {
					unset($this->footerlen[$i]);
				}
				if (isset($this->transfmrk[$j])) {
					$this->transfmrk[$i] = $this->transfmrk[$j];
				} elseif (isset($this->transfmrk[$i])) {
					unset($this->transfmrk[$i]);
				}
				if (isset($this->PageAnnots[$j])) {
					$this->PageAnnots[$i] = $this->PageAnnots[$j];
				} elseif (isset($this->PageAnnots[$i])) {
					unset($this->PageAnnots[$i]);
				}
				if (isset($this->newpagegroup[$j])) {
					$this->newpagegroup[$i] = $this->newpagegroup[$j];
					unset($this->newpagegroup[$j]);
				}
				if ($this->currpagegroup == $j) {
					$this->currpagegroup = $i;
				}
				if (isset($this->pageopen[$j])) {
					$this->pageopen[$i] = $this->pageopen[$j];
				} elseif (isset($this->pageopen[$i])) {
					unset($this->pageopen[$i]);
				}
			}
			// remove last page
			unset($this->pages[$this->numpages]);
			unset($this->pagedim[$this->numpages]);
			unset($this->pagelen[$this->numpages]);
			unset($this->intmrk[$this->numpages]);
			unset($this->bordermrk[$this->numpages]);
			unset($this->cntmrk[$this->numpages]);
			foreach ($this->pageobjects[$this->numpages] as $oid) {
				if (isset($this->offsets[$oid])){
					unset($this->offsets[$oid]);
				}
			}
			unset($this->pageobjects[$this->numpages]);
			if (isset($this->footerpos[$this->numpages])) {
				unset($this->footerpos[$this->numpages]);
			}
			if (isset($this->footerlen[$this->numpages])) {
				unset($this->footerlen[$this->numpages]);
			}
			if (isset($this->transfmrk[$this->numpages])) {
				unset($this->transfmrk[$this->numpages]);
			}
			if (isset($this->PageAnnots[$this->numpages])) {
				unset($this->PageAnnots[$this->numpages]);
			}
			if (isset($this->newpagegroup[$this->numpages])) {
				unset($this->newpagegroup[$this->numpages]);
			}
			if ($this->currpagegroup == $this->numpages) {
				$this->currpagegroup = ($this->numpages - 1);
			}
			if (isset($this->pagegroups[$this->numpages])) {
				unset($this->pagegroups[$this->numpages]);
			}
			if (isset($this->pageopen[$this->numpages])) {
				unset($this->pageopen[$this->numpages]);
			}
		}
		--$this->numpages;
		$this->page = $this->numpages;
		// adjust outlines
		$tmpoutlines = $this->outlines;
		foreach ($tmpoutlines as $key => $outline) {
			if (!$outline['f']) {
				if ($outline['p'] > $page) {
					$this->outlines[$key]['p'] = $outline['p'] - 1;
				} elseif ($outline['p'] == $page) {
					unset($this->outlines[$key]);
				}
			}
		}
		// adjust dests
		$tmpdests = $this->dests;
		foreach ($tmpdests as $key => $dest) {
			if (!$dest['f']) {
				if ($dest['p'] > $page) {
					$this->dests[$key]['p'] = $dest['p'] - 1;
				} elseif ($dest['p'] == $page) {
					unset($this->dests[$key]);
				}
			}
		}
		// adjust links
		$tmplinks = $this->links;
		foreach ($tmplinks as $key => $link) {
			if (!$link['f']) {
				if ($link['p'] > $page) {
					$this->links[$key]['p'] = $link['p'] - 1;
				} elseif ($link['p'] == $page) {
					unset($this->links[$key]);
				}
			}
		}
		// adjust javascript
		$jpage = $page;
		if (preg_match_all('/this\.addField\(\'([^\']*)\',\'([^\']*)\',([0-9]+)/', $this->javascript, $pamatch) > 0) {
			foreach($pamatch[0] as $pk => $pmatch) {
				$pagenum = intval($pamatch[3][$pk]) + 1;
				if ($pagenum >= $jpage) {
					$newpage = ($pagenum - 1);
				} elseif ($pagenum == $jpage) {
					$newpage = 1;
				} else {
					$newpage = $pagenum;
				}
				--$newpage;
				$newjs = "this.addField(\'".$pamatch[1][$pk]."\',\'".$pamatch[2][$pk]."\',".$newpage;
				$this->javascript = str_replace($pmatch, $newjs, $this->javascript);
			}
			unset($pamatch);
		}
		// return to last page
		if ($this->numpages > 0) {
			$this->lastPage(true);
		}
		return true;
	}

	/**
	 * Clone the specified page to a new page.
	 * @param $page (int) number of page to copy (0 = current page)
	 * @return true in case of success, false in case of error.
	 * @public
	 * @since 4.9.015 (2010-04-20)
	 */
	public function copyPage($page=0) {
		if ($page == 0) {
			// default value
			$page = $this->page;
		}
		if (($page < 1) OR ($page > $this->numpages)) {
			return false;
		}
		// close the last page
		$this->endPage();
		// copy all page-related states
		++$this->numpages;
		$this->page = $this->numpages;
		$this->setPageBuffer($this->page, $this->getPageBuffer($page));
		$this->pagedim[$this->page] = $this->pagedim[$page];
		$this->pagelen[$this->page] = $this->pagelen[$page];
		$this->intmrk[$this->page] = $this->intmrk[$page];
		$this->bordermrk[$this->page] = $this->bordermrk[$page];
		$this->cntmrk[$this->page] = $this->cntmrk[$page];
		$this->pageobjects[$this->page] = $this->pageobjects[$page];
		$this->pageopen[$this->page] = false;
		if (isset($this->footerpos[$page])) {
			$this->footerpos[$this->page] = $this->footerpos[$page];
		}
		if (isset($this->footerlen[$page])) {
			$this->footerlen[$this->page] = $this->footerlen[$page];
		}
		if (isset($this->transfmrk[$page])) {
			$this->transfmrk[$this->page] = $this->transfmrk[$page];
		}
		if (isset($this->PageAnnots[$page])) {
			$this->PageAnnots[$this->page] = $this->PageAnnots[$page];
		}
		if (isset($this->newpagegroup[$page])) {
			// start a new group
			$this->newpagegroup[$this->page] = sizeof($this->newpagegroup) + 1;
			$this->currpagegroup = $this->newpagegroup[$this->page];
			$this->pagegroups[$this->currpagegroup] = 1;
		} elseif (isset($this->currpagegroup) AND ($this->currpagegroup > 0)) {
			++$this->pagegroups[$this->currpagegroup];
		}
		// copy outlines
		$tmpoutlines = $this->outlines;
		foreach ($tmpoutlines as $key => $outline) {
			if ($outline['p'] == $page) {
				$this->outlines[] = array('t' => $outline['t'], 'l' => $outline['l'], 'x' => $outline['x'], 'y' => $outline['y'], 'p' => $this->page, 'f' => $outline['f'], 's' => $outline['s'], 'c' => $outline['c']);
			}
		}
		// copy links
		$tmplinks = $this->links;
		foreach ($tmplinks as $key => $link) {
			if ($link['p'] == $page) {
				$this->links[] = array('p' => $this->page, 'y' => $link['y'], 'f' => $link['f']);
			}
		}
		// return to last page
		$this->lastPage(true);
		return true;
	}

	/**
	 * Output a Table of Content Index (TOC).
	 * This method must be called after all Bookmarks were set.
	 * Before calling this method you have to open the page using the addTOCPage() method.
	 * After calling this method you have to call endTOCPage() to close the TOC page.
	 * You can override this method to achieve different styles.
	 * @param $page (int) page number where this TOC should be inserted (leave empty for current page).
	 * @param $numbersfont (string) set the font for page numbers (please use monospaced font for better alignment).
	 * @param $filler (string) string used to fill the space between text and page number.
	 * @param $toc_name (string) name to use for TOC bookmark.
	 * @param $style (string) Font style for title: B = Bold, I = Italic, BI = Bold + Italic.
	 * @param $color (array) RGB color array for bookmark title (values from 0 to 255).
	 * @public
	 * @author Nicola Asuni
	 * @since 4.5.000 (2009-01-02)
	 * @see addTOCPage(), endTOCPage(), addHTMLTOC()
	 */
	public function addTOC($page='', $numbersfont='', $filler='.', $toc_name='TOC', $style='', $color=array(0,0,0)) {
		$fontsize = $this->FontSizePt;
		$fontfamily = $this->FontFamily;
		$fontstyle = $this->FontStyle;
		$w = $this->w - $this->lMargin - $this->rMargin;
		$spacer = $this->GetStringWidth(chr(32)) * 4;
		$lmargin = $this->lMargin;
		$rmargin = $this->rMargin;
		$x_start = $this->GetX();
		$page_first = $this->page;
		$current_page = $this->page;
		$page_fill_start = false;
		$page_fill_end = false;
		$current_column = $this->current_column;
		if (TCPDF_STATIC::empty_string($numbersfont)) {
			$numbersfont = $this->default_monospaced_font;
		}
		if (TCPDF_STATIC::empty_string($filler)) {
			$filler = ' ';
		}
		if (TCPDF_STATIC::empty_string($page)) {
			$gap = ' ';
		} else {
			$gap = '';
			if ($page < 1) {
				$page = 1;
			}
		}
		$this->SetFont($numbersfont, $fontstyle, $fontsize);
		$numwidth = $this->GetStringWidth('00000');
		$maxpage = 0; //used for pages on attached documents
		foreach ($this->outlines as $key => $outline) {
			// check for extra pages (used for attachments)
			if (($this->page > $page_first) AND ($outline['p'] >= $this->numpages)) {
				$outline['p'] += ($this->page - $page_first);
			}
			if ($this->rtl) {
				$aligntext = 'R';
				$alignnum = 'L';
			} else {
				$aligntext = 'L';
				$alignnum = 'R';
			}
			if ($outline['l'] == 0) {
				$this->SetFont($fontfamily, $outline['s'].'B', $fontsize);
			} else {
				$this->SetFont($fontfamily, $outline['s'], $fontsize - $outline['l']);
			}
			$this->SetTextColorArray($outline['c']);
			// check for page break
			$this->checkPageBreak(2 * $this->getCellHeight($this->FontSize));
			// set margins and X position
			if (($this->page == $current_page) AND ($this->current_column == $current_column)) {
				$this->lMargin = $lmargin;
				$this->rMargin = $rmargin;
			} else {
				if ($this->current_column != $current_column) {
					if ($this->rtl) {
						$x_start = $this->w - $this->columns[$this->current_column]['x'];
					} else {
						$x_start = $this->columns[$this->current_column]['x'];
					}
				}
				$lmargin = $this->lMargin;
				$rmargin = $this->rMargin;
				$current_page = $this->page;
				$current_column = $this->current_column;
			}
			$this->SetX($x_start);
			$indent = ($spacer * $outline['l']);
			if ($this->rtl) {
				$this->x -= $indent;
				$this->rMargin = $this->w - $this->x;
			} else {
				$this->x += $indent;
				$this->lMargin = $this->x;
			}
			$link = $this->AddLink();
			$this->SetLink($link, $outline['y'], $outline['p']);
			// write the text
			if ($this->rtl) {
				$txt = ' '.$outline['t'];
			} else {
				$txt = $outline['t'].' ';
			}
			$this->Write(0, $txt, $link, false, $aligntext, false, 0, false, false, 0, $numwidth, '');
			if ($this->rtl) {
				$tw = $this->x - $this->lMargin;
			} else {
				$tw = $this->w - $this->rMargin - $this->x;
			}
			$this->SetFont($numbersfont, $fontstyle, $fontsize);
			if (TCPDF_STATIC::empty_string($page)) {
				$pagenum = $outline['p'];
			} else {
				// placemark to be replaced with the correct number
				$pagenum = '{#'.($outline['p']).'}';
				if ($this->isUnicodeFont()) {
					$pagenum = '{'.$pagenum.'}';
				}
				$maxpage = max($maxpage, $outline['p']);
			}
			$fw = ($tw - $this->GetStringWidth($pagenum.$filler));
			$wfiller = $this->GetStringWidth($filler);
			if ($wfiller > 0) {
				$numfills = floor($fw / $wfiller);
			} else {
				$numfills = 0;
			}
			if ($numfills > 0) {
				$rowfill = str_repeat($filler, $numfills);
			} else {
				$rowfill = '';
			}
			if ($this->rtl) {
				$pagenum = $pagenum.$gap.$rowfill;
			} else {
				$pagenum = $rowfill.$gap.$pagenum;
			}
			// write the number
			$this->Cell($tw, 0, $pagenum, 0, 1, $alignnum, 0, $link, 0);
		}
		$page_last = $this->getPage();
		$numpages = ($page_last - $page_first + 1);
		// account for booklet mode
		if ($this->booklet) {
			// check if a blank page is required before TOC
			$page_fill_start = ((($page_first % 2) == 0) XOR (($page % 2) == 0));
			$page_fill_end = (!((($numpages % 2) == 0) XOR ($page_fill_start)));
			if ($page_fill_start) {
				// add a page at the end (to be moved before TOC)
				$this->addPage();
				++$page_last;
				++$numpages;
			}
			if ($page_fill_end) {
				// add a page at the end
				$this->addPage();
				++$page_last;
				++$numpages;
			}
		}
		$maxpage = max($maxpage, $page_last);
		if (!TCPDF_STATIC::empty_string($page)) {
			for ($p = $page_first; $p <= $page_last; ++$p) {
				// get page data
				$temppage = $this->getPageBuffer($p);
				for ($n = 1; $n <= $maxpage; ++$n) {
					// update page numbers
					$a = '{#'.$n.'}';
					// get page number aliases
					$pnalias = $this->getInternalPageNumberAliases($a);
					// calculate replacement number
					if (($n >= $page) AND ($n <= $this->numpages)) {
						$np = $n + $numpages;
					} else {
						$np = $n;
					}
					$na = TCPDF_STATIC::formatTOCPageNumber(($this->starting_page_number + $np - 1));
					$nu = TCPDF_FONTS::UTF8ToUTF16BE($na, false, $this->isunicode, $this->CurrentFont);
					// replace aliases with numbers
					foreach ($pnalias['u'] as $u) {
						$sfill = str_repeat($filler, max(0, (strlen($u) - strlen($nu.' '))));
						if ($this->rtl) {
							$nr = $nu.TCPDF_FONTS::UTF8ToUTF16BE(' '.$sfill, false, $this->isunicode, $this->CurrentFont);
						} else {
							$nr = TCPDF_FONTS::UTF8ToUTF16BE($sfill.' ', false, $this->isunicode, $this->CurrentFont).$nu;
						}
						$temppage = str_replace($u, $nr, $temppage);
					}
					foreach ($pnalias['a'] as $a) {
						$sfill = str_repeat($filler, max(0, (strlen($a) - strlen($na.' '))));
						if ($this->rtl) {
							$nr = $na.' '.$sfill;
						} else {
							$nr = $sfill.' '.$na;
						}
						$temppage = str_replace($a, $nr, $temppage);
					}
				}
				// save changes
				$this->setPageBuffer($p, $temppage);
			}
			// move pages
			$this->Bookmark($toc_name, 0, 0, $page_first, $style, $color);
			if ($page_fill_start) {
				$this->movePage($page_last, $page_first);
			}
			for ($i = 0; $i < $numpages; ++$i) {
				$this->movePage($page_last, $page);
			}
		}
	}

	/**
	 * Output a Table Of Content Index (TOC) using HTML templates.
	 * This method must be called after all Bookmarks were set.
	 * Before calling this method you have to open the page using the addTOCPage() method.
	 * After calling this method you have to call endTOCPage() to close the TOC page.
	 * @param $page (int) page number where this TOC should be inserted (leave empty for current page).
	 * @param $toc_name (string) name to use for TOC bookmark.
	 * @param $templates (array) array of html templates. Use: "#TOC_DESCRIPTION#" for bookmark title, "#TOC_PAGE_NUMBER#" for page number.
	 * @param $correct_align (boolean) if true correct the number alignment (numbers must be in monospaced font like courier and right aligned on LTR, or left aligned on RTL)
	 * @param $style (string) Font style for title: B = Bold, I = Italic, BI = Bold + Italic.
	 * @param $color (array) RGB color array for title (values from 0 to 255).
	 * @public
	 * @author Nicola Asuni
	 * @since 5.0.001 (2010-05-06)
	 * @see addTOCPage(), endTOCPage(), addTOC()
	 */
	public function addHTMLTOC($page='', $toc_name='TOC', $templates=array(), $correct_align=true, $style='', $color=array(0,0,0)) {
		$filler = ' ';
		$prev_htmlLinkColorArray = $this->htmlLinkColorArray;
		$prev_htmlLinkFontStyle = $this->htmlLinkFontStyle;
		// set new style for link
		$this->htmlLinkColorArray = array();
		$this->htmlLinkFontStyle = '';
		$page_first = $this->getPage();
		$page_fill_start = false;
		$page_fill_end = false;
		// get the font type used for numbers in each template
		$current_font = $this->FontFamily;
		foreach ($templates as $level => $html) {
			$dom = $this->getHtmlDomArray($html);
			foreach ($dom as $key => $value) {
				if ($value['value'] == '#TOC_PAGE_NUMBER#') {
					$this->SetFont($dom[($key - 1)]['fontname']);
					$templates['F'.$level] = $this->isUnicodeFont();
				}
			}
		}
		$this->SetFont($current_font);
		$maxpage = 0; //used for pages on attached documents
		foreach ($this->outlines as $key => $outline) {
			// get HTML template
			$row = $templates[$outline['l']];
			if (TCPDF_STATIC::empty_string($page)) {
				$pagenum = $outline['p'];
			} else {
				// placemark to be replaced with the correct number
				$pagenum = '{#'.($outline['p']).'}';
				if ($templates['F'.$outline['l']]) {
					$pagenum = '{'.$pagenum.'}';
				}
				$maxpage = max($maxpage, $outline['p']);
			}
			// replace templates with current values
			$row = str_replace('#TOC_DESCRIPTION#', $outline['t'], $row);
			$row = str_replace('#TOC_PAGE_NUMBER#', $pagenum, $row);
			// add link to page
			$row = '<a href="#'.$outline['p'].','.$outline['y'].'">'.$row.'</a>';
			// write bookmark entry
			$this->writeHTML($row, false, false, true, false, '');
		}
		// restore link styles
		$this->htmlLinkColorArray = $prev_htmlLinkColorArray;
		$this->htmlLinkFontStyle = $prev_htmlLinkFontStyle;
		// move TOC page and replace numbers
		$page_last = $this->getPage();
		$numpages = ($page_last - $page_first + 1);
		// account for booklet mode
		if ($this->booklet) {
			// check if a blank page is required before TOC
			$page_fill_start = ((($page_first % 2) == 0) XOR (($page % 2) == 0));
			$page_fill_end = (!((($numpages % 2) == 0) XOR ($page_fill_start)));
			if ($page_fill_start) {
				// add a page at the end (to be moved before TOC)
				$this->addPage();
				++$page_last;
				++$numpages;
			}
			if ($page_fill_end) {
				// add a page at the end
				$this->addPage();
				++$page_last;
				++$numpages;
			}
		}
		$maxpage = max($maxpage, $page_last);
		if (!TCPDF_STATIC::empty_string($page)) {
			for ($p = $page_first; $p <= $page_last; ++$p) {
				// get page data
				$temppage = $this->getPageBuffer($p);
				for ($n = 1; $n <= $maxpage; ++$n) {
					// update page numbers
					$a = '{#'.$n.'}';
					// get page number aliases
					$pnalias = $this->getInternalPageNumberAliases($a);
					// calculate replacement number
					if ($n >= $page) {
						$np = $n + $numpages;
					} else {
						$np = $n;
					}
					$na = TCPDF_STATIC::formatTOCPageNumber(($this->starting_page_number + $np - 1));
					$nu = TCPDF_FONTS::UTF8ToUTF16BE($na, false, $this->isunicode, $this->CurrentFont);
					// replace aliases with numbers
					foreach ($pnalias['u'] as $u) {
						if ($correct_align) {
							$sfill = str_repeat($filler, (strlen($u) - strlen($nu.' ')));
							if ($this->rtl) {
								$nr = $nu.TCPDF_FONTS::UTF8ToUTF16BE(' '.$sfill, false, $this->isunicode, $this->CurrentFont);
							} else {
								$nr = TCPDF_FONTS::UTF8ToUTF16BE($sfill.' ', false, $this->isunicode, $this->CurrentFont).$nu;
							}
						} else {
							$nr = $nu;
						}
						$temppage = str_replace($u, $nr, $temppage);
					}
					foreach ($pnalias['a'] as $a) {
						if ($correct_align) {
							$sfill = str_repeat($filler, (strlen($a) - strlen($na.' ')));
							if ($this->rtl) {
								$nr = $na.' '.$sfill;
							} else {
								$nr = $sfill.' '.$na;
							}
						} else {
							$nr = $na;
						}
						$temppage = str_replace($a, $nr, $temppage);
					}
				}
				// save changes
				$this->setPageBuffer($p, $temppage);
			}
			// move pages
			$this->Bookmark($toc_name, 0, 0, $page_first, $style, $color);
			if ($page_fill_start) {
				$this->movePage($page_last, $page_first);
			}
			for ($i = 0; $i < $numpages; ++$i) {
				$this->movePage($page_last, $page);
			}
		}
	}

	/**
	 * Stores a copy of the current TCPDF object used for undo operation.
	 * @public
	 * @since 4.5.029 (2009-03-19)
	 */
	public function startTransaction() {
		if (isset($this->objcopy)) {
			// remove previous copy
			$this->commitTransaction();
		}
		// record current page number and Y position
		$this->start_transaction_page = $this->page;
		$this->start_transaction_y = $this->y;
		// clone current object
		$this->objcopy = TCPDF_STATIC::objclone($this);
	}

	/**
	 * Delete the copy of the current TCPDF object used for undo operation.
	 * @public
	 * @since 4.5.029 (2009-03-19)
	 */
	public function commitTransaction() {
		if (isset($this->objcopy)) {
			$this->objcopy->_destroy(true, true);
			unset($this->objcopy);
		}
	}

	/**
	 * This method allows to undo the latest transaction by returning the latest saved TCPDF object with startTransaction().
	 * @param $self (boolean) if true restores current class object to previous state without the need of reassignment via the returned value.
	 * @return TCPDF object.
	 * @public
	 * @since 4.5.029 (2009-03-19)
	 */
	public function rollbackTransaction($self=false) {
		if (isset($this->objcopy)) {
			$this->_destroy(true, true);
			if ($self) {
				$objvars = get_object_vars($this->objcopy);
				foreach ($objvars as $key => $value) {
					$this->$key = $value;
				}
			}
			return $this->objcopy;
		}
		return $this;
	}

	// --- MULTI COLUMNS METHODS -----------------------

	/**
	 * Set multiple columns of the same size
	 * @param $numcols (int) number of columns (set to zero to disable columns mode)
	 * @param $width (int) column width
	 * @param $y (int) column starting Y position (leave empty for current Y position)
	 * @public
	 * @since 4.9.001 (2010-03-28)
	 */
	public function setEqualColumns($numcols=0, $width=0, $y='') {
		$this->columns = array();
		if ($numcols < 2) {
			$numcols = 0;
			$this->columns = array();
		} else {
			// maximum column width
			$maxwidth = ($this->w - $this->original_lMargin - $this->original_rMargin) / $numcols;
			if (($width == 0) OR ($width > $maxwidth)) {
				$width = $maxwidth;
			}
			if (TCPDF_STATIC::empty_string($y)) {
				$y = $this->y;
			}
			// space between columns
			$space = (($this->w - $this->original_lMargin - $this->original_rMargin - ($numcols * $width)) / ($numcols - 1));
			// fill the columns array (with, space, starting Y position)
			for ($i = 0; $i < $numcols; ++$i) {
				$this->columns[$i] = array('w' => $width, 's' => $space, 'y' => $y);
			}
		}
		$this->num_columns = $numcols;
		$this->current_column = 0;
		$this->column_start_page = $this->page;
		$this->selectColumn(0);
	}

	/**
	 * Remove columns and reset page margins.
	 * @public
	 * @since 5.9.072 (2011-04-26)
	 */
	public function resetColumns() {
		$this->lMargin = $this->original_lMargin;
		$this->rMargin = $this->original_rMargin;
		$this->setEqualColumns();
	}

	/**
	 * Set columns array.
	 * Each column is represented by an array of arrays with the following keys: (w = width, s = space between columns, y = column top position).
	 * @param $columns (array)
	 * @public
	 * @since 4.9.001 (2010-03-28)
	 */
	public function setColumnsArray($columns) {
		$this->columns = $columns;
		$this->num_columns = count($columns);
		$this->current_column = 0;
		$this->column_start_page = $this->page;
		$this->selectColumn(0);
	}

	/**
	 * Set position at a given column
	 * @param $col (int) column number (from 0 to getNumberOfColumns()-1); empty string = current column.
	 * @public
	 * @since 4.9.001 (2010-03-28)
	 */
	public function selectColumn($col='') {
		if (is_string($col)) {
			$col = $this->current_column;
		} elseif ($col >= $this->num_columns) {
			$col = 0;
		}
		$xshift = array('x' => 0, 's' => array('H' => 0, 'V' => 0), 'p' => array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0));
		$enable_thead = false;
		if ($this->num_columns > 1) {
			if ($col != $this->current_column) {
				// move Y pointer at the top of the column
				if ($this->column_start_page == $this->page) {
					$this->y = $this->columns[$col]['y'];
				} else {
					$this->y = $this->tMargin;
				}
				// Avoid to write table headers more than once
				if (($this->page > $this->maxselcol['page']) OR (($this->page == $this->maxselcol['page']) AND ($col > $this->maxselcol['column']))) {
					$enable_thead = true;
					$this->maxselcol['page'] = $this->page;
					$this->maxselcol['column'] = $col;
				}
			}
			$xshift = $this->colxshift;
			// set X position of the current column by case
			$listindent = ($this->listindentlevel * $this->listindent);
			// calculate column X position
			$colpos = 0;
			for ($i = 0; $i < $col; ++$i) {
				$colpos += ($this->columns[$i]['w'] + $this->columns[$i]['s']);
			}
			if ($this->rtl) {
				$x = $this->w - $this->original_rMargin - $colpos;
				$this->rMargin = ($this->w - $x + $listindent);
				$this->lMargin = ($x - $this->columns[$col]['w']);
				$this->x = $x - $listindent;
			} else {
				$x = $this->original_lMargin + $colpos;
				$this->lMargin = ($x + $listindent);
				$this->rMargin = ($this->w - $x - $this->columns[$col]['w']);
				$this->x = $x + $listindent;
			}
			$this->columns[$col]['x'] = $x;
		}
		$this->current_column = $col;
		// fix for HTML mode
		$this->newline = true;
		// print HTML table header (if any)
		if ((!TCPDF_STATIC::empty_string($this->thead)) AND (!$this->inthead)) {
			if ($enable_thead) {
				// print table header
				$this->writeHTML($this->thead, false, false, false, false, '');
				$this->y += $xshift['s']['V'];
				// store end of header position
				if (!isset($this->columns[$col]['th'])) {
					$this->columns[$col]['th'] = array();
				}
				$this->columns[$col]['th']['\''.$this->page.'\''] = $this->y;
				$this->lasth = 0;
			} elseif (isset($this->columns[$col]['th']['\''.$this->page.'\''])) {
				$this->y = $this->columns[$col]['th']['\''.$this->page.'\''];
			}
		}
		// account for an html table cell over multiple columns
		if ($this->rtl) {
			$this->rMargin += $xshift['x'];
			$this->x -= ($xshift['x'] + $xshift['p']['R']);
		} else {
			$this->lMargin += $xshift['x'];
			$this->x += $xshift['x'] + $xshift['p']['L'];
		}
	}

	/**
	 * Return the current column number
	 * @return int current column number
	 * @public
	 * @since 5.5.011 (2010-07-08)
	 */
	public function getColumn() {
		return $this->current_column;
	}

	/**
	 * Return the current number of columns.
	 * @return int number of columns
	 * @public
	 * @since 5.8.018 (2010-08-25)
	 */
	public function getNumberOfColumns() {
		return $this->num_columns;
	}

	/**
	 * Set Text rendering mode.
	 * @param $stroke (int) outline size in user units (0 = disable).
	 * @param $fill (boolean) if true fills the text (default).
	 * @param $clip (boolean) if true activate clipping mode
	 * @public
	 * @since 4.9.008 (2009-04-02)
	 */
	public function setTextRenderingMode($stroke=0, $fill=true, $clip=false) {
		// Ref.: PDF 32000-1:2008 - 9.3.6 Text Rendering Mode
		// convert text rendering parameters
		if ($stroke < 0) {
			$stroke = 0;
		}
		if ($fill === true) {
			if ($stroke > 0) {
				if ($clip === true) {
					// Fill, then stroke text and add to path for clipping
					$textrendermode = 6;
				} else {
					// Fill, then stroke text
					$textrendermode = 2;
				}
				$textstrokewidth = $stroke;
			} else {
				if ($clip === true) {
					// Fill text and add to path for clipping
					$textrendermode = 4;
				} else {
					// Fill text
					$textrendermode = 0;
				}
			}
		} else {
			if ($stroke > 0) {
				if ($clip === true) {
					// Stroke text and add to path for clipping
					$textrendermode = 5;
				} else {
					// Stroke text
					$textrendermode = 1;
				}
				$textstrokewidth = $stroke;
			} else {
				if ($clip === true) {
					// Add text to path for clipping
					$textrendermode = 7;
				} else {
					// Neither fill nor stroke text (invisible)
					$textrendermode = 3;
				}
			}
		}
		$this->textrendermode = $textrendermode;
		$this->textstrokewidth = $stroke;
	}

	/**
	 * Set parameters for drop shadow effect for text.
	 * @param $params (array) Array of parameters: enabled (boolean) set to true to enable shadow; depth_w (float) shadow width in user units; depth_h (float) shadow height in user units; color (array) shadow color or false to use the stroke color; opacity (float) Alpha value: real value from 0 (transparent) to 1 (opaque); blend_mode (string) blend mode, one of the following: Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn, HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity.
	 * @since 5.9.174 (2012-07-25)
	 * @public
	*/
	public function setTextShadow($params=array('enabled'=>false, 'depth_w'=>0, 'depth_h'=>0, 'color'=>false, 'opacity'=>1, 'blend_mode'=>'Normal')) {
		if (isset($params['enabled'])) {
			$this->txtshadow['enabled'] = $params['enabled']?true:false;
		} else {
			$this->txtshadow['enabled'] = false;
		}
		if (isset($params['depth_w'])) {
			$this->txtshadow['depth_w'] = floatval($params['depth_w']);
		} else {
			$this->txtshadow['depth_w'] = 0;
		}
		if (isset($params['depth_h'])) {
			$this->txtshadow['depth_h'] = floatval($params['depth_h']);
		} else {
			$this->txtshadow['depth_h'] = 0;
		}
		if (isset($params['color']) AND ($params['color'] !== false) AND is_array($params['color'])) {
			$this->txtshadow['color'] = $params['color'];
		} else {
			$this->txtshadow['color'] = $this->strokecolor;
		}
		if (isset($params['opacity'])) {
			$this->txtshadow['opacity'] = min(1, max(0, floatval($params['opacity'])));
		} else {
			$this->txtshadow['opacity'] = 1;
		}
		if (isset($params['blend_mode']) AND in_array($params['blend_mode'], array('Normal', 'Multiply', 'Screen', 'Overlay', 'Darken', 'Lighten', 'ColorDodge', 'ColorBurn', 'HardLight', 'SoftLight', 'Difference', 'Exclusion', 'Hue', 'Saturation', 'Color', 'Luminosity'))) {
			$this->txtshadow['blend_mode'] = $params['blend_mode'];
		} else {
			$this->txtshadow['blend_mode'] = 'Normal';
		}
		if ((($this->txtshadow['depth_w'] == 0) AND ($this->txtshadow['depth_h'] == 0)) OR ($this->txtshadow['opacity'] == 0)) {
			$this->txtshadow['enabled'] = false;
		}
	}

	/**
	 * Return the text shadow parameters array.
	 * @return Array of parameters.
	 * @since 5.9.174 (2012-07-25)
	 * @public
	 */
	public function getTextShadow() {
		return $this->txtshadow;
	}

	/**
	 * Returns an array of chars containing soft hyphens.
	 * @param $word (array) array of chars
	 * @param $patterns (array) Array of hypenation patterns.
	 * @param $dictionary (array) Array of words to be returned without applying the hyphenation algorithm.
	 * @param $leftmin (int) Minimum number of character to leave on the left of the word without applying the hyphens.
	 * @param $rightmin (int) Minimum number of character to leave on the right of the word without applying the hyphens.
	 * @param $charmin (int) Minimum word length to apply the hyphenation algorithm.
	 * @param $charmax (int) Maximum length of broken piece of word.
	 * @return array text with soft hyphens
	 * @author Nicola Asuni
	 * @since 4.9.012 (2010-04-12)
	 * @protected
	 */
	protected function hyphenateWord($word, $patterns, $dictionary=array(), $leftmin=1, $rightmin=2, $charmin=1, $charmax=8) {
		$hyphenword = array(); // hyphens positions
		$numchars = count($word);
		if ($numchars <= $charmin) {
			return $word;
		}
		$word_string = TCPDF_FONTS::UTF8ArrSubString($word, '', '', $this->isunicode);
		// some words will be returned as-is
		$pattern = '/^([a-zA-Z0-9_\.\-]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
		if (preg_match($pattern, $word_string) > 0) {
			// email
			return $word;
		}
		$pattern = '/(([a-zA-Z0-9\-]+\.)?)((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
		if (preg_match($pattern, $word_string) > 0) {
			// URL
			return $word;
		}
		if (isset($dictionary[$word_string])) {
			return TCPDF_FONTS::UTF8StringToArray($dictionary[$word_string], $this->isunicode, $this->CurrentFont);
		}
		// surround word with '_' characters
		$tmpword = array_merge(array(46), $word, array(46));
		$tmpnumchars = $numchars + 2;
		$maxpos = $tmpnumchars - 1;
		for ($pos = 0; $pos < $maxpos; ++$pos) {
			$imax = min(($tmpnumchars - $pos), $charmax);
			for ($i = 1; $i <= $imax; ++$i) {
				$subword = strtolower(TCPDF_FONTS::UTF8ArrSubString($tmpword, $pos, ($pos + $i), $this->isunicode));
				if (isset($patterns[$subword])) {
					$pattern = TCPDF_FONTS::UTF8StringToArray($patterns[$subword], $this->isunicode, $this->CurrentFont);
					$pattern_length = count($pattern);
					$digits = 1;
					for ($j = 0; $j < $pattern_length; ++$j) {
						// check if $pattern[$j] is a number = hyphenation level (only numbers from 1 to 5 are valid)
						if (($pattern[$j] >= 48) AND ($pattern[$j] <= 57)) {
							if ($j == 0) {
								$zero = $pos - 1;
							} else {
								$zero = $pos + $j - $digits;
							}
							// get hyphenation level
							$level = ($pattern[$j] - 48);
							// if two levels from two different patterns match at the same point, the higher one is selected.
							if (!isset($hyphenword[$zero]) OR ($hyphenword[$zero] < $level)) {
								$hyphenword[$zero] = $level;
							}
							++$digits;
						}
					}
				}
			}
		}
		$inserted = 0;
		$maxpos = $numchars - $rightmin;
		for ($i = $leftmin; $i <= $maxpos; ++$i) {
			// only odd levels indicate allowed hyphenation points
			if (isset($hyphenword[$i]) AND (($hyphenword[$i] % 2) != 0)) {
				// 173 = soft hyphen character
				array_splice($word, $i + $inserted, 0, 173);
				++$inserted;
			}
		}
		return $word;
	}

	/**
	 * Returns text with soft hyphens.
	 * @param $text (string) text to process
	 * @param $patterns (mixed) Array of hypenation patterns or a TEX file containing hypenation patterns. TEX patterns can be downloaded from http://www.ctan.org/tex-archive/language/hyph-utf8/tex/generic/hyph-utf8/patterns/
	 * @param $dictionary (array) Array of words to be returned without applying the hyphenation algorithm.
	 * @param $leftmin (int) Minimum number of character to leave on the left of the word without applying the hyphens.
	 * @param $rightmin (int) Minimum number of character to leave on the right of the word without applying the hyphens.
	 * @param $charmin (int) Minimum word length to apply the hyphenation algorithm.
	 * @param $charmax (int) Maximum length of broken piece of word.
	 * @return array text with soft hyphens
	 * @author Nicola Asuni
	 * @since 4.9.012 (2010-04-12)
	 * @public
	 */
	public function hyphenateText($text, $patterns, $dictionary=array(), $leftmin=1, $rightmin=2, $charmin=1, $charmax=8) {
		$text = $this->unhtmlentities($text);
		$word = array(); // last word
		$txtarr = array(); // text to be returned
		$intag = false; // true if we are inside an HTML tag
		$skip = false; // true to skip hyphenation
		if (!is_array($patterns)) {
			$patterns = TCPDF_STATIC::getHyphenPatternsFromTEX($patterns);
		}
		// get array of characters
		$unichars = TCPDF_FONTS::UTF8StringToArray($text, $this->isunicode, $this->CurrentFont);
		// for each char
		foreach ($unichars as $char) {
			if ((!$intag) AND (!$skip) AND TCPDF_FONT_DATA::$uni_type[$char] == 'L') {
				// letter character
				$word[] = $char;
			} else {
				// other type of character
				if (!TCPDF_STATIC::empty_string($word)) {
					// hypenate the word
					$txtarr = array_merge($txtarr, $this->hyphenateWord($word, $patterns, $dictionary, $leftmin, $rightmin, $charmin, $charmax));
					$word = array();
				}
				$txtarr[] = $char;
				if (chr($char) == '<') {
					// we are inside an HTML tag
					$intag = true;
				} elseif ($intag AND (chr($char) == '>')) {
					// end of HTML tag
					$intag = false;
					// check for style tag
					$expected = array(115, 116, 121, 108, 101); // = 'style'
					$current = array_slice($txtarr, -6, 5); // last 5 chars
					$compare = array_diff($expected, $current);
					if (empty($compare)) {
						// check if it is a closing tag
						$expected = array(47); // = '/'
						$current = array_slice($txtarr, -7, 1);
						$compare = array_diff($expected, $current);
						if (empty($compare)) {
							// closing style tag
							$skip = false;
						} else {
							// opening style tag
							$skip = true;
						}
					}
				}
			}
		}
		if (!TCPDF_STATIC::empty_string($word)) {
			// hypenate the word
			$txtarr = array_merge($txtarr, $this->hyphenateWord($word, $patterns, $dictionary, $leftmin, $rightmin, $charmin, $charmax));
		}
		// convert char array to string and return
		return TCPDF_FONTS::UTF8ArrSubString($txtarr, '', '', $this->isunicode);
	}

	/**
	 * Enable/disable rasterization of vector images using ImageMagick library.
	 * @param $mode (boolean) if true enable rasterization, false otherwise.
	 * @public
	 * @since 5.0.000 (2010-04-27)
	 */
	public function setRasterizeVectorImages($mode) {
		$this->rasterize_vector_images = $mode;
	}

	/**
	 * Enable or disable default option for font subsetting.
	 * @param $enable (boolean) if true enable font subsetting by default.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.3.002 (2010-06-07)
	 */
	public function setFontSubsetting($enable=true) {
		if ($this->pdfa_mode) {
			$this->font_subsetting = false;
		} else {
			$this->font_subsetting = $enable ? true : false;
		}
	}

	/**
	 * Return the default option for font subsetting.
	 * @return boolean default font subsetting state.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.3.002 (2010-06-07)
	 */
	public function getFontSubsetting() {
		return $this->font_subsetting;
	}

	/**
	 * Left trim the input string
	 * @param $str (string) string to trim
	 * @param $replace (string) string that replace spaces.
	 * @return left trimmed string
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.000 (2010-08-11)
	 */
	public function stringLeftTrim($str, $replace='') {
		return preg_replace('/^'.$this->re_space['p'].'+/'.$this->re_space['m'], $replace, $str);
	}

	/**
	 * Right trim the input string
	 * @param $str (string) string to trim
	 * @param $replace (string) string that replace spaces.
	 * @return right trimmed string
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.000 (2010-08-11)
	 */
	public function stringRightTrim($str, $replace='') {
		return preg_replace('/'.$this->re_space['p'].'+$/'.$this->re_space['m'], $replace, $str);
	}

	/**
	 * Trim the input string
	 * @param $str (string) string to trim
	 * @param $replace (string) string that replace spaces.
	 * @return trimmed string
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.000 (2010-08-11)
	 */
	public function stringTrim($str, $replace='') {
		$str = $this->stringLeftTrim($str, $replace);
		$str = $this->stringRightTrim($str, $replace);
		return $str;
	}

	/**
	 * Return true if the current font is unicode type.
	 * @return true for unicode font, false otherwise.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.002 (2010-08-14)
	 */
	public function isUnicodeFont() {
		return (($this->CurrentFont['type'] == 'TrueTypeUnicode') OR ($this->CurrentFont['type'] == 'cidfont0'));
	}

	/**
	 * Return normalized font name
	 * @param $fontfamily (string) property string containing font family names
	 * @return string normalized font name
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.004 (2010-08-17)
	 */
	public function getFontFamilyName($fontfamily) {
		// remove spaces and symbols
		$fontfamily = preg_replace('/[^a-z0-9_\,]/', '', strtolower($fontfamily));
		// extract all font names
		$fontslist = preg_split('/[,]/', $fontfamily);
		// find first valid font name
		foreach ($fontslist as $font) {
			// replace font variations
			$font = preg_replace('/regular$/', '', $font);
			$font = preg_replace('/italic$/', 'I', $font);
			$font = preg_replace('/oblique$/', 'I', $font);
			$font = preg_replace('/bold([I]?)$/', 'B\\1', $font);
			// replace common family names and core fonts
			$pattern = array();
			$replacement = array();
			$pattern[] = '/^serif|^cursive|^fantasy|^timesnewroman/';
			$replacement[] = 'times';
			$pattern[] = '/^sansserif/';
			$replacement[] = 'helvetica';
			$pattern[] = '/^monospace/';
			$replacement[] = 'courier';
			$font = preg_replace($pattern, $replacement, $font);
			if (in_array(strtolower($font), $this->fontlist) OR in_array($font, $this->fontkeys)) {
				return $font;
			}
		}
		// return current font as default
		return $this->CurrentFont['fontkey'];
	}

	/**
	 * Start a new XObject Template.
	 * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
	 * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
	 * Note: X,Y coordinates will be reset to 0,0.
	 * @param $w (int) Template width in user units (empty string or zero = page width less margins).
	 * @param $h (int) Template height in user units (empty string or zero = page height less margins).
	 * @param $group (mixed) Set transparency group. Can be a boolean value or an array specifying optional parameters: 'CS' (solour space name), 'I' (boolean flag to indicate isolated group) and 'K' (boolean flag to indicate knockout group).
	 * @return int the XObject Template ID in case of success or false in case of error.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.017 (2010-08-24)
	 * @see endTemplate(), printTemplate()
	 */
	public function startTemplate($w=0, $h=0, $group=false) {
		if ($this->inxobj) {
			// we are already inside an XObject template
			return false;
		}
		$this->inxobj = true;
		++$this->n;
		// XObject ID
		$this->xobjid = 'XT'.$this->n;
		// object ID
		$this->xobjects[$this->xobjid] = array('n' => $this->n);
		// store current graphic state
		$this->xobjects[$this->xobjid]['gvars'] = $this->getGraphicVars();
		// initialize data
		$this->xobjects[$this->xobjid]['intmrk'] = 0;
		$this->xobjects[$this->xobjid]['transfmrk'] = array();
		$this->xobjects[$this->xobjid]['outdata'] = '';
		$this->xobjects[$this->xobjid]['xobjects'] = array();
		$this->xobjects[$this->xobjid]['images'] = array();
		$this->xobjects[$this->xobjid]['fonts'] = array();
		$this->xobjects[$this->xobjid]['annotations'] = array();
		$this->xobjects[$this->xobjid]['extgstates'] = array();
		$this->xobjects[$this->xobjid]['gradients'] = array();
		$this->xobjects[$this->xobjid]['spot_colors'] = array();
		// set new environment
		$this->num_columns = 1;
		$this->current_column = 0;
		$this->SetAutoPageBreak(false);
		if (($w === '') OR ($w <= 0)) {
			$w = $this->w - $this->lMargin - $this->rMargin;
		}
		if (($h === '') OR ($h <= 0)) {
			$h = $this->h - $this->tMargin - $this->bMargin;
		}
		$this->xobjects[$this->xobjid]['x'] = 0;
		$this->xobjects[$this->xobjid]['y'] = 0;
		$this->xobjects[$this->xobjid]['w'] = $w;
		$this->xobjects[$this->xobjid]['h'] = $h;
		$this->w = $w;
		$this->h = $h;
		$this->wPt = $this->w * $this->k;
		$this->hPt = $this->h * $this->k;
		$this->fwPt = $this->wPt;
		$this->fhPt = $this->hPt;
		$this->x = 0;
		$this->y = 0;
		$this->lMargin = 0;
		$this->rMargin = 0;
		$this->tMargin = 0;
		$this->bMargin = 0;
		// set group mode
		$this->xobjects[$this->xobjid]['group'] = $group;
		return $this->xobjid;
	}

	/**
	 * End the current XObject Template started with startTemplate() and restore the previous graphic state.
	 * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
	 * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
	 * @return int the XObject Template ID in case of success or false in case of error.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.017 (2010-08-24)
	 * @see startTemplate(), printTemplate()
	 */
	public function endTemplate() {
		if (!$this->inxobj) {
			// we are not inside a template
			return false;
		}
		$this->inxobj = false;
		// restore previous graphic state
		$this->setGraphicVars($this->xobjects[$this->xobjid]['gvars'], true);
		return $this->xobjid;
	}

	/**
	 * Print an XObject Template.
	 * You can print an XObject Template inside the currently opened Template.
	 * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
	 * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
	 * @param $id (string) The ID of XObject Template to print.
	 * @param $x (int) X position in user units (empty string = current x position)
	 * @param $y (int) Y position in user units (empty string = current y position)
	 * @param $w (int) Width in user units (zero = remaining page width)
	 * @param $h (int) Height in user units (zero = remaining page height)
	 * @param $align (string) Indicates the alignment of the pointer next to template insertion relative to template height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
	 * @param $palign (string) Allows to center or align the template on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
	 * @param $fitonpage (boolean) If true the template is resized to not exceed page dimensions.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.8.017 (2010-08-24)
	 * @see startTemplate(), endTemplate()
	 */
	public function printTemplate($id, $x='', $y='', $w=0, $h=0, $align='', $palign='', $fitonpage=false) {
		if ($this->state != 2) {
			 return;
		}
		if (!isset($this->xobjects[$id])) {
			$this->Error('The XObject Template \''.$id.'\' doesn\'t exist!');
		}
		if ($this->inxobj) {
			if ($id == $this->xobjid) {
				// close current template
				$this->endTemplate();
			} else {
				// use the template as resource for the template currently opened
				$this->xobjects[$this->xobjid]['xobjects'][$id] = $this->xobjects[$id];
			}
		}
		// set default values
		if ($x === '') {
			$x = $this->x;
		}
		if ($y === '') {
			$y = $this->y;
		}
		// check page for no-write regions and adapt page margins if necessary
		list($x, $y) = $this->checkPageRegions($h, $x, $y);
		$ow = $this->xobjects[$id]['w'];
		if ($ow <= 0) {
			$ow = 1;
		}
		$oh = $this->xobjects[$id]['h'];
		if ($oh <= 0) {
			$oh = 1;
		}
		// calculate template width and height on document
		if (($w <= 0) AND ($h <= 0)) {
			$w = $ow;
			$h = $oh;
		} elseif ($w <= 0) {
			$w = $h * $ow / $oh;
		} elseif ($h <= 0) {
			$h = $w * $oh / $ow;
		}
		// fit the template on available space
		list($w, $h, $x, $y) = $this->fitBlock($w, $h, $x, $y, $fitonpage);
		// set page alignment
		$rb_y = $y + $h;
		// set alignment
		if ($this->rtl) {
			if ($palign == 'L') {
				$xt = $this->lMargin;
			} elseif ($palign == 'C') {
				$xt = ($this->w + $this->lMargin - $this->rMargin - $w) / 2;
			} elseif ($palign == 'R') {
				$xt = $this->w - $this->rMargin - $w;
			} else {
				$xt = $x - $w;
			}
			$rb_x = $xt;
		} else {
			if ($palign == 'L') {
				$xt = $this->lMargin;
			} elseif ($palign == 'C') {
				$xt = ($this->w + $this->lMargin - $this->rMargin - $w) / 2;
			} elseif ($palign == 'R') {
				$xt = $this->w - $this->rMargin - $w;
			} else {
				$xt = $x;
			}
			$rb_x = $xt + $w;
		}
		// print XObject Template + Transformation matrix
		$this->StartTransform();
		// translate and scale
		$sx = ($w / $ow);
		$sy = ($h / $oh);
		$tm = array();
		$tm[0] = $sx;
		$tm[1] = 0;
		$tm[2] = 0;
		$tm[3] = $sy;
		$tm[4] = $xt * $this->k;
		$tm[5] = ($this->h - $h - $y) * $this->k;
		$this->Transform($tm);
		// set object
		$this->_out('/'.$id.' Do');
		$this->StopTransform();
		// add annotations
		if (!empty($this->xobjects[$id]['annotations'])) {
			foreach ($this->xobjects[$id]['annotations'] as $annot) {
				// transform original coordinates
				$coordlt = TCPDF_STATIC::getTransformationMatrixProduct($tm, array(1, 0, 0, 1, ($annot['x'] * $this->k), (-$annot['y'] * $this->k)));
				$ax = ($coordlt[4] / $this->k);
				$ay = ($this->h - $h - ($coordlt[5] / $this->k));
				$coordrb = TCPDF_STATIC::getTransformationMatrixProduct($tm, array(1, 0, 0, 1, (($annot['x'] + $annot['w']) * $this->k), ((-$annot['y'] - $annot['h']) * $this->k)));
				$aw = ($coordrb[4] / $this->k) - $ax;
				$ah = ($this->h - $h - ($coordrb[5] / $this->k)) - $ay;
				$this->Annotation($ax, $ay, $aw, $ah, $annot['text'], $annot['opt'], $annot['spaces']);
			}
		}
		// set pointer to align the next text/objects
		switch($align) {
			case 'T': {
				$this->y = $y;
				$this->x = $rb_x;
				break;
			}
			case 'M': {
				$this->y = $y + round($h/2);
				$this->x = $rb_x;
				break;
			}
			case 'B': {
				$this->y = $rb_y;
				$this->x = $rb_x;
				break;
			}
			case 'N': {
				$this->SetY($rb_y);
				break;
			}
			default:{
				break;
			}
		}
	}

	/**
	 * Set the percentage of character stretching.
	 * @param $perc (int) percentage of stretching (100 = no stretching)
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.000 (2010-09-29)
	 */
	public function setFontStretching($perc=100) {
		$this->font_stretching = $perc;
	}

	/**
	 * Get the percentage of character stretching.
	 * @return float stretching value
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.000 (2010-09-29)
	 */
	public function getFontStretching() {
		return $this->font_stretching;
	}

	/**
	 * Set the amount to increase or decrease the space between characters in a text.
	 * @param $spacing (float) amount to increase or decrease the space between characters in a text (0 = default spacing)
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.000 (2010-09-29)
	 */
	public function setFontSpacing($spacing=0) {
		$this->font_spacing = $spacing;
	}

	/**
	 * Get the amount to increase or decrease the space between characters in a text.
	 * @return int font spacing (tracking) value
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.000 (2010-09-29)
	 */
	public function getFontSpacing() {
		return $this->font_spacing;
	}

	/**
	 * Return an array of no-write page regions
	 * @return array of no-write page regions
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.003 (2010-10-13)
	 * @see setPageRegions(), addPageRegion()
	 */
	public function getPageRegions() {
		return $this->page_regions;
	}

	/**
	 * Set no-write regions on page.
	 * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
	 * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
	 * You can set multiple regions for the same page.
	 * @param $regions (array) array of no-write regions. For each region you can define an array as follow: ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right). Omit this parameter to remove all regions.
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.003 (2010-10-13)
	 * @see addPageRegion(), getPageRegions()
	 */
	public function setPageRegions($regions=array()) {
		// empty current regions array
		$this->page_regions = array();
		// add regions
		foreach ($regions as $data) {
			$this->addPageRegion($data);
		}
	}

	/**
	 * Add a single no-write region on selected page.
	 * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
	 * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
	 * You can set multiple regions for the same page.
	 * @param $region (array) array of a single no-write region array: ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right).
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.003 (2010-10-13)
	 * @see setPageRegions(), getPageRegions()
	 */
	public function addPageRegion($region) {
		if (!isset($region['page']) OR empty($region['page'])) {
			$region['page'] = $this->page;
		}
		if (isset($region['xt']) AND isset($region['xb']) AND ($region['xt'] > 0) AND ($region['xb'] > 0)
			AND isset($region['yt'])  AND isset($region['yb']) AND ($region['yt'] >= 0) AND ($region['yt'] < $region['yb'])
			AND isset($region['side']) AND (($region['side'] == 'L') OR ($region['side'] == 'R'))) {
			$this->page_regions[] = $region;
		}
	}

	/**
	 * Remove a single no-write region.
	 * @param $key (int) region key
	 * @author Nicola Asuni
	 * @public
	 * @since 5.9.003 (2010-10-13)
	 * @see setPageRegions(), getPageRegions()
	 */
	public function removePageRegion($key) {
		if (isset($this->page_regions[$key])) {
			unset($this->page_regions[$key]);
		}
	}

	/**
	 * Check page for no-write regions and adapt current coordinates and page margins if necessary.
	 * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
	 * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
	 * @param $h (float) height of the text/image/object to print in user units
	 * @param $x (float) current X coordinate in user units
	 * @param $y (float) current Y coordinate in user units
	 * @return array($x, $y)
	 * @author Nicola Asuni
	 * @protected
	 * @since 5.9.003 (2010-10-13)
	 */
	protected function checkPageRegions($h, $x, $y) {
		// set default values
		if ($x === '') {
			$x = $this->x;
		}
		if ($y === '') {
			$y = $this->y;
		}
		if (!$this->check_page_regions OR empty($this->page_regions)) {
			// no page regions defined
			return array($x, $y);
		}
		if (empty($h)) {
			$h = $this->getCellHeight($this->FontSize);
		}
		// check for page break
		if ($this->checkPageBreak($h, $y)) {
			// the content will be printed on a new page
			$x = $this->x;
			$y = $this->y;
		}
		if ($this->num_columns > 1) {
			if ($this->rtl) {
				$this->lMargin = ($this->columns[$this->current_column]['x'] - $this->columns[$this->current_column]['w']);
			} else {
				$this->rMargin = ($this->w - $this->columns[$this->current_column]['x'] - $this->columns[$this->current_column]['w']);
			}
		} else {
			if ($this->rtl) {
				$this->lMargin = max($this->clMargin, $this->original_lMargin);
			} else {
				$this->rMargin = max($this->crMargin, $this->original_rMargin);
			}
		}
		// adjust coordinates and page margins
		foreach ($this->page_regions as $regid => $regdata) {
			if ($regdata['page'] == $this->page) {
				// check region boundaries
				if (($y > ($regdata['yt'] - $h)) AND ($y <= $regdata['yb'])) {
					// Y is inside the region
					$minv = ($regdata['xb'] - $regdata['xt']) / ($regdata['yb'] - $regdata['yt']); // inverse of angular coefficient
					$yt = max($y, $regdata['yt']);
					$yb = min(($yt + $h), $regdata['yb']);
					$xt = (($yt - $regdata['yt']) * $minv) + $regdata['xt'];
					$xb = (($yb - $regdata['yt']) * $minv) + $regdata['xt'];
					if ($regdata['side'] == 'L') { // left side
						$new_margin = max($xt, $xb);
						if ($this->lMargin < $new_margin) {
							if ($this->rtl) {
								// adjust left page margin
								$this->lMargin = max(0, $new_margin);
							}
							if ($x < $new_margin) {
								// adjust x position
								$x = $new_margin;
								if ($new_margin > ($this->w - $this->rMargin)) {
									// adjust y position
									$y = $regdata['yb'] - $h;
								}
							}
						}
					} elseif ($regdata['side'] == 'R') { // right side
						$new_margin = min($xt, $xb);
						if (($this->w - $this->rMargin) > $new_margin) {
							if (!$this->rtl) {
								// adjust right page margin
								$this->rMargin = max(0, ($this->w - $new_margin));
							}
							if ($x > $new_margin) {
								// adjust x position
								$x = $new_margin;
								if ($new_margin > $this->lMargin) {
									// adjust y position
									$y = $regdata['yb'] - $h;
								}
							}
						}
					}
				}
			}
		}
		return array($x, $y);
	}

	// --- SVG METHODS ---------------------------------------------------------

	/**
	 * Embedd a Scalable Vector Graphics (SVG) image.
	 * NOTE: SVG standard is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
	 * @param $file (string) Name of the SVG file or a '@' character followed by the SVG data string.
	 * @param $x (float) Abscissa of the upper-left corner.
	 * @param $y (float) Ordinate of the upper-left corner.
	 * @param $w (float) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param $h (float) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param $link (mixed) URL or identifier returned by AddLink().
	 * @param $align (string) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul> If the alignment is an empty string, then the pointer will be restored on the starting SVG position.
	 * @param $palign (string) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
	 * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
	 * @param $fitonpage (boolean) if true the image is resized to not exceed page dimensions.
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @public
	 */
	public function ImageSVG($file, $x='', $y='', $w=0, $h=0, $link='', $align='', $palign='', $border=0, $fitonpage=false) {
		if ($this->state != 2) {
			 return;
		}
		// reset SVG vars
		$this->svggradients = array();
		$this->svggradientid = 0;
		$this->svgdefsmode = false;
		$this->svgdefs = array();
		$this->svgclipmode = false;
		$this->svgclippaths = array();
		$this->svgcliptm = array();
		$this->svgclipid = 0;
		$this->svgtext = '';
		$this->svgtextmode = array();
		if ($this->rasterize_vector_images AND ($w > 0) AND ($h > 0)) {
			// convert SVG to raster image using GD or ImageMagick libraries
			return $this->Image($file, $x, $y, $w, $h, 'SVG', $link, $align, true, 300, $palign, false, false, $border, false, false, false);
		}
		if ($file[0] === '@') { // image from string
			$this->svgdir = '';
			$svgdata = substr($file, 1);
		} else { // SVG file
			$this->svgdir = dirname($file);
			$svgdata = TCPDF_STATIC::fileGetContents($file);
		}
		if ($svgdata === FALSE) {
			$this->Error('SVG file not found: '.$file);
		}
		if ($x === '') {
			$x = $this->x;
		}
		if ($y === '') {
			$y = $this->y;
		}
		// check page for no-write regions and adapt page margins if necessary
		list($x, $y) = $this->checkPageRegions($h, $x, $y);
		$k = $this->k;
		$ox = 0;
		$oy = 0;
		$ow = $w;
		$oh = $h;
		$aspect_ratio_align = 'xMidYMid';
		$aspect_ratio_ms = 'meet';
		$regs = array();
		// get original image width and height
		preg_match('/<svg([^\>]*)>/si', $svgdata, $regs);
		if (isset($regs[1]) AND !empty($regs[1])) {
			$tmp = array();
			if (preg_match('/[\s]+x[\s]*=[\s]*"([^"]*)"/si', $regs[1], $tmp)) {
				$ox = $this->getHTMLUnitToUnits($tmp[1], 0, $this->svgunit, false);
			}
			$tmp = array();
			if (preg_match('/[\s]+y[\s]*=[\s]*"([^"]*)"/si', $regs[1], $tmp)) {
				$oy = $this->getHTMLUnitToUnits($tmp[1], 0, $this->svgunit, false);
			}
			$tmp = array();
			if (preg_match('/[\s]+width[\s]*=[\s]*"([^"]*)"/si', $regs[1], $tmp)) {
				$ow = $this->getHTMLUnitToUnits($tmp[1], 1, $this->svgunit, false);
			}
			$tmp = array();
			if (preg_match('/[\s]+height[\s]*=[\s]*"([^"]*)"/si', $regs[1], $tmp)) {
				$oh = $this->getHTMLUnitToUnits($tmp[1], 1, $this->svgunit, false);
			}
			$tmp = array();
			$view_box = array();
			if (preg_match('/[\s]+viewBox[\s]*=[\s]*"[\s]*([0-9\.\-]+)[\s]+([0-9\.\-]+)[\s]+([0-9\.]+)[\s]+([0-9\.]+)[\s]*"/si', $regs[1], $tmp)) {
				if (count($tmp) == 5) {
					array_shift($tmp);
					foreach ($tmp as $key => $val) {
						$view_box[$key] = $this->getHTMLUnitToUnits($val, 0, $this->svgunit, false);
					}
					$ox = $view_box[0];
					$oy = $view_box[1];
				}
				// get aspect ratio
				$tmp = array();
				if (preg_match('/[\s]+preserveAspectRatio[\s]*=[\s]*"([^"]*)"/si', $regs[1], $tmp)) {
					$aspect_ratio = preg_split('/[\s]+/si', $tmp[1]);
					switch (count($aspect_ratio)) {
						case 3: {
							$aspect_ratio_align = $aspect_ratio[1];
							$aspect_ratio_ms = $aspect_ratio[2];
							break;
						}
						case 2: {
							$aspect_ratio_align = $aspect_ratio[0];
							$aspect_ratio_ms = $aspect_ratio[1];
							break;
						}
						case 1: {
							$aspect_ratio_align = $aspect_ratio[0];
							$aspect_ratio_ms = 'meet';
							break;
						}
					}
				}
			}
		}
		if ($ow <= 0) {
			$ow = 1;
		}
		if ($oh <= 0) {
			$oh = 1;
		}
		// calculate image width and height on document
		if (($w <= 0) AND ($h <= 0)) {
			// convert image size to document unit
			$w = $ow;
			$h = $oh;
		} elseif ($w <= 0) {
			$w = $h * $ow / $oh;
		} elseif ($h <= 0) {
			$h = $w * $oh / $ow;
		}
		// fit the image on available space
		list($w, $h, $x, $y) = $this->fitBlock($w, $h, $x, $y, $fitonpage);
		if ($this->rasterize_vector_images) {
			// convert SVG to raster image using GD or ImageMagick libraries
			return $this->Image($file, $x, $y, $w, $h, 'SVG', $link, $align, true, 300, $palign, false, false, $border, false, false, false);
		}
		// set alignment
		$this->img_rb_y = $y + $h;
		// set alignment
		if ($this->rtl) {
			if ($palign == 'L') {
				$ximg = $this->lMargin;
			} elseif ($palign == 'C') {
				$ximg = ($this->w + $this->lMargin - $this->rMargin - $w) / 2;
			} elseif ($palign == 'R') {
				$ximg = $this->w - $this->rMargin - $w;
			} else {
				$ximg = $x - $w;
			}
			$this->img_rb_x = $ximg;
		} else {
			if ($palign == 'L') {
				$ximg = $this->lMargin;
			} elseif ($palign == 'C') {
				$ximg = ($this->w + $this->lMargin - $this->rMargin - $w) / 2;
			} elseif ($palign == 'R') {
				$ximg = $this->w - $this->rMargin - $w;
			} else {
				$ximg = $x;
			}
			$this->img_rb_x = $ximg + $w;
		}
		// store current graphic vars
		$gvars = $this->getGraphicVars();
		// store SVG position and scale factors
		$svgoffset_x = ($ximg - $ox) * $this->k;
		$svgoffset_y = -($y - $oy) * $this->k;
		if (isset($view_box[2]) AND ($view_box[2] > 0) AND ($view_box[3] > 0)) {
			$ow = $view_box[2];
			$oh = $view_box[3];
		} else {
			if ($ow <= 0) {
				$ow = $w;
			}
			if ($oh <= 0) {
				$oh = $h;
			}
		}
		$svgscale_x = $w / $ow;
		$svgscale_y = $h / $oh;
		// scaling and alignment
		if ($aspect_ratio_align != 'none') {
			// store current scaling values
			$svgscale_old_x = $svgscale_x;
			$svgscale_old_y = $svgscale_y;
			// force uniform scaling
			if ($aspect_ratio_ms == 'slice') {
				// the entire viewport is covered by the viewBox
				if ($svgscale_x > $svgscale_y) {
					$svgscale_y = $svgscale_x;
				} elseif ($svgscale_x < $svgscale_y) {
					$svgscale_x = $svgscale_y;
				}
			} else { // meet
				// the entire viewBox is visible within the viewport
				if ($svgscale_x < $svgscale_y) {
					$svgscale_y = $svgscale_x;
				} elseif ($svgscale_x > $svgscale_y) {
					$svgscale_x = $svgscale_y;
				}
			}
			// correct X alignment
			switch (substr($aspect_ratio_align, 1, 3)) {
				case 'Min': {
					// do nothing
					break;
				}
				case 'Max': {
					$svgoffset_x += (($w * $this->k) - ($ow * $this->k * $svgscale_x));
					break;
				}
				default:
				case 'Mid': {
					$svgoffset_x += ((($w * $this->k) - ($ow * $this->k * $svgscale_x)) / 2);
					break;
				}
			}
			// correct Y alignment
			switch (substr($aspect_ratio_align, 5)) {
				case 'Min': {
					// do nothing
					break;
				}
				case 'Max': {
					$svgoffset_y -= (($h * $this->k) - ($oh * $this->k * $svgscale_y));
					break;
				}
				default:
				case 'Mid': {
					$svgoffset_y -= ((($h * $this->k) - ($oh * $this->k * $svgscale_y)) / 2);
					break;
				}
			}
		}
		// store current page break mode
		$page_break_mode = $this->AutoPageBreak;
		$page_break_margin = $this->getBreakMargin();
		$cell_padding = $this->cell_padding;
		$this->SetCellPadding(0);
		$this->SetAutoPageBreak(false);
		// save the current graphic state
		$this->_out('q'.$this->epsmarker);
		// set initial clipping mask
		$this->Rect($ximg, $y, $w, $h, 'CNZ', array(), array());
		// scale and translate
		$e = $ox * $this->k * (1 - $svgscale_x);
		$f = ($this->h - $oy) * $this->k * (1 - $svgscale_y);
		$this->_out(sprintf('%F %F %F %F %F %F cm', $svgscale_x, 0, 0, $svgscale_y, ($e + $svgoffset_x), ($f + $svgoffset_y)));
		// creates a new XML parser to be used by the other XML functions
		$this->parser = xml_parser_create('UTF-8');
		// the following function allows to use parser inside object
		xml_set_object($this->parser, $this);
		// disable case-folding for this XML parser
		xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, 0);
		// sets the element handler functions for the XML parser
		xml_set_element_handler($this->parser, 'startSVGElementHandler', 'endSVGElementHandler');
		// sets the character data handler function for the XML parser
		xml_set_character_data_handler($this->parser, 'segSVGContentHandler');
		// start parsing an XML document
		if (!xml_parse($this->parser, $svgdata)) {
			$error_message = sprintf('SVG Error: %s at line %d', xml_error_string(xml_get_error_code($this->parser)), xml_get_current_line_number($this->parser));
			$this->Error($error_message);
		}
		// free this XML parser
		xml_parser_free($this->parser);
		// restore previous graphic state
		$this->_out($this->epsmarker.'Q');
		// restore graphic vars
		$this->setGraphicVars($gvars);
		$this->lasth = $gvars['lasth'];
		if (!empty($border)) {
			$bx = $this->x;
			$by = $this->y;
			$this->x = $ximg;
			if ($this->rtl) {
				$this->x += $w;
			}
			$this->y = $y;
			$this->Cell($w, $h, '', $border, 0, '', 0, '', 0, true);
			$this->x = $bx;
			$this->y = $by;
		}
		if ($link) {
			$this->Link($ximg, $y, $w, $h, $link, 0);
		}
		// set pointer to align the next text/objects
		switch($align) {
			case 'T':{
				$this->y = $y;
				$this->x = $this->img_rb_x;
				break;
			}
			case 'M':{
				$this->y = $y + round($h/2);
				$this->x = $this->img_rb_x;
				break;
			}
			case 'B':{
				$this->y = $this->img_rb_y;
				$this->x = $this->img_rb_x;
				break;
			}
			case 'N':{
				$this->SetY($this->img_rb_y);
				break;
			}
			default:{
				// restore pointer to starting position
				$this->x = $gvars['x'];
				$this->y = $gvars['y'];
				$this->page = $gvars['page'];
				$this->current_column = $gvars['current_column'];
				$this->tMargin = $gvars['tMargin'];
				$this->bMargin = $gvars['bMargin'];
				$this->w = $gvars['w'];
				$this->h = $gvars['h'];
				$this->wPt = $gvars['wPt'];
				$this->hPt = $gvars['hPt'];
				$this->fwPt = $gvars['fwPt'];
				$this->fhPt = $gvars['fhPt'];
				break;
			}
		}
		$this->endlinex = $this->img_rb_x;
		// restore page break
		$this->SetAutoPageBreak($page_break_mode, $page_break_margin);
		$this->cell_padding = $cell_padding;
	}

	/**
	 * Convert SVG transformation matrix to PDF.
	 * @param $tm (array) original SVG transformation matrix
	 * @return array transformation matrix
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected function convertSVGtMatrix($tm) {
		$a = $tm[0];
		$b = -$tm[1];
		$c = -$tm[2];
		$d = $tm[3];
		$e = $this->getHTMLUnitToUnits($tm[4], 1, $this->svgunit, false) * $this->k;
		$f = -$this->getHTMLUnitToUnits($tm[5], 1, $this->svgunit, false) * $this->k;
		$x = 0;
		$y = $this->h * $this->k;
		$e = ($x * (1 - $a)) - ($y * $c) + $e;
		$f = ($y * (1 - $d)) - ($x * $b) + $f;
		return array($a, $b, $c, $d, $e, $f);
	}

	/**
	 * Apply SVG graphic transformation matrix.
	 * @param $tm (array) original SVG transformation matrix
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected function SVGTransform($tm) {
		$this->Transform($this->convertSVGtMatrix($tm));
	}

	/**
	 * Apply the requested SVG styles (*** TO BE COMPLETED ***)
	 * @param $svgstyle (array) array of SVG styles to apply
	 * @param $prevsvgstyle (array) array of previous SVG style
	 * @param $x (int) X origin of the bounding box
	 * @param $y (int) Y origin of the bounding box
	 * @param $w (int) width of the bounding box
	 * @param $h (int) height of the bounding box
	 * @param $clip_function (string) clip function
	 * @param $clip_params (array) array of parameters for clipping function
	 * @return object style
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @protected
	 */
	protected function setSVGStyles($svgstyle, $prevsvgstyle, $x=0, $y=0, $w=1, $h=1, $clip_function='', $clip_params=array()) {
		if ($this->state != 2) {
			 return;
		}
		$objstyle = '';
		$minlen = (0.01 / $this->k); // minimum acceptable length
		if (!isset($svgstyle['opacity'])) {
			return $objstyle;
		}
		// clip-path
		$regs = array();
		if (preg_match('/url\([\s]*\#([^\)]*)\)/si', $svgstyle['clip-path'], $regs)) {
			$clip_path = $this->svgclippaths[$regs[1]];
			foreach ($clip_path as $cp) {
				$this->startSVGElementHandler('clip-path', $cp['name'], $cp['attribs'], $cp['tm']);
			}
		}
		// opacity
		if ($svgstyle['opacity'] != 1) {
			$this->setAlpha($svgstyle['opacity'], 'Normal', $svgstyle['opacity'], false);
		}
		// color
		$fill_color = TCPDF_COLORS::convertHTMLColorToDec($svgstyle['color'], $this->spot_colors);
		$this->SetFillColorArray($fill_color);
		// text color
		$text_color = TCPDF_COLORS::convertHTMLColorToDec($svgstyle['text-color'], $this->spot_colors);
		$this->SetTextColorArray($text_color);
		// clip
		if (preg_match('/rect\(([a-z0-9\-\.]*)[\s]*([a-z0-9\-\.]*)[\s]*([a-z0-9\-\.]*)[\s]*([a-z0-9\-\.]*)\)/si', $svgstyle['clip'], $regs)) {
			$top = (isset($regs[1])?$this->getHTMLUnitToUnits($regs[1], 0, $this->svgunit, false):0);
			$right = (isset($regs[2])?$this->getHTMLUnitToUnits($regs[2], 0, $this->svgunit, false):0);
			$bottom = (isset($regs[3])?$this->getHTMLUnitToUnits($regs[3], 0, $this->svgunit, false):0);
			$left = (isset($regs[4])?$this->getHTMLUnitToUnits($regs[4], 0, $this->svgunit, false):0);
			$cx = $x + $left;
			$cy = $y + $top;
			$cw = $w - $left - $right;
			$ch = $h - $top - $bottom;
			if ($svgstyle['clip-rule'] == 'evenodd') {
				$clip_rule = 'CNZ';
			} else {
				$clip_rule = 'CEO';
			}
			$this->Rect($cx, $cy, $cw, $ch, $clip_rule, array(), array());
		}
		// fill
		$regs = array();
		if (preg_match('/url\([\s]*\#([^\)]*)\)/si', $svgstyle['fill'], $regs)) {
			// gradient
			$gradient = $this->svggradients[$regs[1]];
			if (isset($gradient['xref'])) {
				// reference to another gradient definition
				$newgradient = $this->svggradients[$gradient['xref']];
				$newgradient['coords'] = $gradient['coords'];
				$newgradient['mode'] = $gradient['mode'];
				$newgradient['type'] = $gradient['type'];
				$newgradient['gradientUnits'] = $gradient['gradientUnits'];
				if (isset($gradient['gradientTransform'])) {
					$newgradient['gradientTransform'] = $gradient['gradientTransform'];
				}
				$gradient = $newgradient;
			}
			//save current Graphic State
			$this->_outSaveGraphicsState();
			//set clipping area
			if (!empty($clip_function) AND method_exists($this, $clip_function)) {
				$bbox = call_user_func_array(array($this, $clip_function), $clip_params);
				if ((!isset($gradient['type']) OR ($gradient['type'] != 3)) AND is_array($bbox) AND (count($bbox) == 4)) {
					list($x, $y, $w, $h) = $bbox;
				}
			}
			if ($gradient['mode'] == 'measure') {
				if (!isset($gradient['coords'][4])) {
					$gradient['coords'][4] = 0.5;
				}
				if (isset($gradient['gradientTransform']) AND !empty($gradient['gradientTransform'])) {
					$gtm = $gradient['gradientTransform'];
					// apply transformation matrix
					$xa = ($gtm[0] * $gradient['coords'][0]) + ($gtm[2] * $gradient['coords'][1]) + $gtm[4];
					$ya = ($gtm[1] * $gradient['coords'][0]) + ($gtm[3] * $gradient['coords'][1]) + $gtm[5];
					$xb = ($gtm[0] * $gradient['coords'][2]) + ($gtm[2] * $gradient['coords'][3]) + $gtm[4];
					$yb = ($gtm[1] * $gradient['coords'][2]) + ($gtm[3] * $gradient['coords'][3]) + $gtm[5];
					$r = sqrt(pow(($gtm[0] * $gradient['coords'][4]), 2) + pow(($gtm[1] * $gradient['coords'][4]), 2));
					$gradient['coords'][0] = $xa;
					$gradient['coords'][1] = $ya;
					$gradient['coords'][2] = $xb;
					$gradient['coords'][3] = $yb;
					$gradient['coords'][4] = $r;
				}
				// convert SVG coordinates to user units
				$gradient['coords'][0] = $this->getHTMLUnitToUnits($gradient['coords'][0], 0, $this->svgunit, false);
				$gradient['coords'][1] = $this->getHTMLUnitToUnits($gradient['coords'][1], 0, $this->svgunit, false);
				$gradient['coords'][2] = $this->getHTMLUnitToUnits($gradient['coords'][2], 0, $this->svgunit, false);
				$gradient['coords'][3] = $this->getHTMLUnitToUnits($gradient['coords'][3], 0, $this->svgunit, false);
				$gradient['coords'][4] = $this->getHTMLUnitToUnits($gradient['coords'][4], 0, $this->svgunit, false);
				if ($w <= $minlen) {
					$w = $minlen;
				}
				if ($h <= $minlen) {
					$h = $minlen;
				}
				// shift units
				if ($gradient['gradientUnits'] == 'objectBoundingBox') {
					// convert to SVG coordinate system
					$gradient['coords'][0] += $x;
					$gradient['coords'][1] += $y;
					$gradient['coords'][2] += $x;
					$gradient['coords'][3] += $y;
				}
				// calculate percentages
				$gradient['coords'][0] = (($gradient['coords'][0] - $x) / $w);
				$gradient['coords'][1] = (($gradient['coords'][1] - $y) / $h);
				$gradient['coords'][2] = (($gradient['coords'][2] - $x) / $w);
				$gradient['coords'][3] = (($gradient['coords'][3] - $y) / $h);
				$gradient['coords'][4] /= $w;
			} elseif ($gradient['mode'] == 'percentage') {
				foreach($gradient['coords'] as $key => $val) {
					$gradient['coords'][$key] = (intval($val) / 100);
					if ($val < 0) {
						$gradient['coords'][$key] = 0;
					} elseif ($val > 1) {
						$gradient['coords'][$key] = 1;
					}
				}
			}
			if (($gradient['type'] == 2) AND ($gradient['coords'][0] == $gradient['coords'][2]) AND ($gradient['coords'][1] == $gradient['coords'][3])) {
				// single color (no shading)
				$gradient['coords'][0] = 1;
				$gradient['coords'][1] = 0;
				$gradient['coords'][2] = 0.999;
				$gradient['coords'][3] = 0;
			}
			// swap Y coordinates
			$tmp = $gradient['coords'][1];
			$gradient['coords'][1] = $gradient['coords'][3];
			$gradient['coords'][3] = $tmp;
			// set transformation map for gradient
			$cy = ($this->h - $y);
			if ($gradient['type'] == 3) {
				// circular gradient
				$cy -= ($gradient['coords'][1] * ($w + $h));
				$h = $w = max($w, $h);
			} else {
				$cy -= $h;
			}
			$this->_out(sprintf('%F 0 0 %F %F %F cm', ($w * $this->k), ($h * $this->k), ($x * $this->k), ($cy * $this->k)));
			if (count($gradient['stops']) > 1) {
				$this->Gradient($gradient['type'], $gradient['coords'], $gradient['stops'], array(), false);
			}
		} elseif ($svgstyle['fill'] != 'none') {
			$fill_color = TCPDF_COLORS::convertHTMLColorToDec($svgstyle['fill'], $this->spot_colors);
			if ($svgstyle['fill-opacity'] != 1) {
				$this->setAlpha($this->alpha['CA'], 'Normal', $svgstyle['fill-opacity'], false);
			}
			$this->SetFillColorArray($fill_color);
			if ($svgstyle['fill-rule'] == 'evenodd') {
				$objstyle .= 'F*';
			} else {
				$objstyle .= 'F';
			}
		}
		// stroke
		if ($svgstyle['stroke'] != 'none') {
			if ($svgstyle['stroke-opacity'] != 1) {
				$this->setAlpha($svgstyle['stroke-opacity'], 'Normal', $this->alpha['ca'], false);
			} elseif (preg_match('/rgba\(\d+%?,\s*\d+%?,\s*\d+%?,\s*(\d+(?:\.\d+)?)\)/i', $svgstyle['stroke'], $rgba_matches)) {
				$this->setAlpha($rgba_matches[1], 'Normal', $this->alpha['ca'], false);
			}
			$stroke_style = array(
				'color' => TCPDF_COLORS::convertHTMLColorToDec($svgstyle['stroke'], $this->spot_colors),
				'width' => $this->getHTMLUnitToUnits($svgstyle['stroke-width'], 0, $this->svgunit, false),
				'cap' => $svgstyle['stroke-linecap'],
				'join' => $svgstyle['stroke-linejoin']
				);
			if (isset($svgstyle['stroke-dasharray']) AND !empty($svgstyle['stroke-dasharray']) AND ($svgstyle['stroke-dasharray'] != 'none')) {
				$stroke_style['dash'] = $svgstyle['stroke-dasharray'];
			}
			$this->SetLineStyle($stroke_style);
			$objstyle .= 'D';
		}
		// font
		$regs = array();
		if (!empty($svgstyle['font'])) {
			if (preg_match('/font-family[\s]*:[\s]*([^\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_family = $this->getFontFamilyName($regs[1]);
			} else {
				$font_family = $svgstyle['font-family'];
			}
			if (preg_match('/font-size[\s]*:[\s]*([^\s\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_size = trim($regs[1]);
			} else {
				$font_size = $svgstyle['font-size'];
			}
			if (preg_match('/font-style[\s]*:[\s]*([^\s\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_style = trim($regs[1]);
			} else {
				$font_style = $svgstyle['font-style'];
			}
			if (preg_match('/font-weight[\s]*:[\s]*([^\s\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_weight = trim($regs[1]);
			} else {
				$font_weight = $svgstyle['font-weight'];
			}
			if (preg_match('/font-stretch[\s]*:[\s]*([^\s\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_stretch = trim($regs[1]);
			} else {
				$font_stretch = $svgstyle['font-stretch'];
			}
			if (preg_match('/letter-spacing[\s]*:[\s]*([^\s\;\"]*)/si', $svgstyle['font'], $regs)) {
				$font_spacing = trim($regs[1]);
			} else {
				$font_spacing = $svgstyle['letter-spacing'];
			}
		} else {
			$font_family = $this->getFontFamilyName($svgstyle['font-family']);
			$font_size = $svgstyle['font-size'];
			$font_style = $svgstyle['font-style'];
			$font_weight = $svgstyle['font-weight'];
			$font_stretch = $svgstyle['font-stretch'];
			$font_spacing = $svgstyle['letter-spacing'];
		}
		$font_size = $this->getHTMLFontUnits($font_size, $this->svgstyles[0]['font-size'], $prevsvgstyle['font-size'], $this->svgunit);
		$font_stretch = $this->getCSSFontStretching($font_stretch, $svgstyle['font-stretch']);
		$font_spacing = $this->getCSSFontSpacing($font_spacing, $svgstyle['letter-spacing']);
		switch ($font_style) {
			case 'italic': {
				$font_style = 'I';
				break;
			}
			case 'oblique': {
				$font_style = 'I';
				break;
			}
			default:
			case 'normal': {
				$font_style = '';
				break;
			}
		}
		switch ($font_weight) {
			case 'bold':
			case 'bolder': {
				$font_style .= 'B';
				break;
			}
			case 'normal': {
				if ((substr($font_family, -1) == 'I') AND (substr($font_family, -2, 1) == 'B')) {
					$font_family = substr($font_family, 0, -2).'I';
				} elseif (substr($font_family, -1) == 'B') {
					$font_family = substr($font_family, 0, -1);
				}
				break;
			}
		}
		switch ($svgstyle['text-decoration']) {
			case 'underline': {
				$font_style .= 'U';
				break;
			}
			case 'overline': {
				$font_style .= 'O';
				break;
			}
			case 'line-through': {
				$font_style .= 'D';
				break;
			}
			default:
			case 'none': {
				break;
			}
		}
		$this->SetFont($font_family, $font_style, $font_size);
		$this->setFontStretching($font_stretch);
		$this->setFontSpacing($font_spacing);
		return $objstyle;
	}

	/**
	 * Draws an SVG path
	 * @param $d (string) attribute d of the path SVG element
	 * @param $style (string) Style of rendering. Possible values are:
	 * <ul>
	 *	 <li>D or empty string: Draw (default).</li>
	 *	 <li>F: Fill.</li>
	 *	 <li>F*: Fill using the even-odd rule to determine which regions lie inside the clipping path.</li>
	 *	 <li>DF or FD: Draw and fill.</li>
	 *	 <li>DF* or FD*: Draw and fill using the even-odd rule to determine which regions lie inside the clipping path.</li>
	 *	 <li>CNZ: Clipping mode (using the even-odd rule to determine which regions lie inside the clipping path).</li>
	 *	 <li>CEO: Clipping mode (using the nonzero winding number rule to determine which regions lie inside the clipping path).</li>
	 * </ul>
	 * @return array of container box measures (x, y, w, h)
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @protected
	 */
	protected function SVGPath($d, $style='') {
		if ($this->state != 2) {
			 return;
		}
		// set fill/stroke style
		$op = TCPDF_STATIC::getPathPaintOperator($style, '');
		if (empty($op)) {
			return;
		}
		$paths = array();
		$d = preg_replace('/([0-9ACHLMQSTVZ])([\-\+])/si', '\\1 \\2', $d);
		preg_match_all('/([ACHLMQSTVZ])[\s]*([^ACHLMQSTVZ\"]*)/si', $d, $paths, PREG_SET_ORDER);
		$x = 0;
		$y = 0;
		$x1 = 0;
		$y1 = 0;
		$x2 = 0;
		$y2 = 0;
		$xmin = 2147483647;
		$xmax = 0;
		$ymin = 2147483647;
		$ymax = 0;
		$relcoord = false;
		$minlen = (0.01 / $this->k); // minimum acceptable length (3 point)
		$firstcmd = true; // used to print first point
		// draw curve pieces
		foreach ($paths as $key => $val) {
			// get curve type
			$cmd = trim($val[1]);
			if (strtolower($cmd) == $cmd) {
				// use relative coordinated instead of absolute
				$relcoord = true;
				$xoffset = $x;
				$yoffset = $y;
			} else {
				$relcoord = false;
				$xoffset = 0;
				$yoffset = 0;
			}
			$params = array();
			if (isset($val[2])) {
				// get curve parameters
				$rawparams = preg_split('/([\,\s]+)/si', trim($val[2]));
				$params = array();
				foreach ($rawparams as $ck => $cp) {
					$params[$ck] = $this->getHTMLUnitToUnits($cp, 0, $this->svgunit, false);
					if (abs($params[$ck]) < $minlen) {
						// approximate little values to zero
						$params[$ck] = 0;
					}
				}
			}
			// store current origin point
			$x0 = $x;
			$y0 = $y;
			switch (strtoupper($cmd)) {
				case 'M': { // moveto
					foreach ($params as $ck => $cp) {
						if (($ck % 2) == 0) {
							$x = $cp + $xoffset;
						} else {
							$y = $cp + $yoffset;
							if ($firstcmd OR (abs($x0 - $x) >= $minlen) OR (abs($y0 - $y) >= $minlen)) {
								if ($ck == 1) {
									$this->_outPoint($x, $y);
									$firstcmd = false;
								} else {
									$this->_outLine($x, $y);
								}
								$x0 = $x;
								$y0 = $y;
							}
							$xmin = min($xmin, $x);
							$ymin = min($ymin, $y);
							$xmax = max($xmax, $x);
							$ymax = max($ymax, $y);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'L': { // lineto
					foreach ($params as $ck => $cp) {
						if (($ck % 2) == 0) {
							$x = $cp + $xoffset;
						} else {
							$y = $cp + $yoffset;
							if ((abs($x0 - $x) >= $minlen) OR (abs($y0 - $y) >= $minlen)) {
								$this->_outLine($x, $y);
								$x0 = $x;
								$y0 = $y;
							}
							$xmin = min($xmin, $x);
							$ymin = min($ymin, $y);
							$xmax = max($xmax, $x);
							$ymax = max($ymax, $y);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'H': { // horizontal lineto
					foreach ($params as $ck => $cp) {
						$x = $cp + $xoffset;
						if ((abs($x0 - $x) >= $minlen) OR (abs($y0 - $y) >= $minlen)) {
							$this->_outLine($x, $y);
							$x0 = $x;
							$y0 = $y;
						}
						$xmin = min($xmin, $x);
						$xmax = max($xmax, $x);
						if ($relcoord) {
							$xoffset = $x;
						}
					}
					break;
				}
				case 'V': { // vertical lineto
					foreach ($params as $ck => $cp) {
						$y = $cp + $yoffset;
						if ((abs($x0 - $x) >= $minlen) OR (abs($y0 - $y) >= $minlen)) {
							$this->_outLine($x, $y);
							$x0 = $x;
							$y0 = $y;
						}
						$ymin = min($ymin, $y);
						$ymax = max($ymax, $y);
						if ($relcoord) {
							$yoffset = $y;
						}
					}
					break;
				}
				case 'C': { // curveto
					foreach ($params as $ck => $cp) {
						$params[$ck] = $cp;
						if ((($ck + 1) % 6) == 0) {
							$x1 = $params[($ck - 5)] + $xoffset;
							$y1 = $params[($ck - 4)] + $yoffset;
							$x2 = $params[($ck - 3)] + $xoffset;
							$y2 = $params[($ck - 2)] + $yoffset;
							$x = $params[($ck - 1)] + $xoffset;
							$y = $params[($ck)] + $yoffset;
							$this->_outCurve($x1, $y1, $x2, $y2, $x, $y);
							$xmin = min($xmin, $x, $x1, $x2);
							$ymin = min($ymin, $y, $y1, $y2);
							$xmax = max($xmax, $x, $x1, $x2);
							$ymax = max($ymax, $y, $y1, $y2);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'S': { // shorthand/smooth curveto
					foreach ($params as $ck => $cp) {
						$params[$ck] = $cp;
						if ((($ck + 1) % 4) == 0) {
							if (($key > 0) AND ((strtoupper($paths[($key - 1)][1]) == 'C') OR (strtoupper($paths[($key - 1)][1]) == 'S'))) {
								$x1 = (2 * $x) - $x2;
								$y1 = (2 * $y) - $y2;
							} else {
								$x1 = $x;
								$y1 = $y;
							}
							$x2 = $params[($ck - 3)] + $xoffset;
							$y2 = $params[($ck - 2)] + $yoffset;
							$x = $params[($ck - 1)] + $xoffset;
							$y = $params[($ck)] + $yoffset;
							$this->_outCurve($x1, $y1, $x2, $y2, $x, $y);
							$xmin = min($xmin, $x, $x1, $x2);
							$ymin = min($ymin, $y, $y1, $y2);
							$xmax = max($xmax, $x, $x1, $x2);
							$ymax = max($ymax, $y, $y1, $y2);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'Q': { // quadratic Bezier curveto
					foreach ($params as $ck => $cp) {
						$params[$ck] = $cp;
						if ((($ck + 1) % 4) == 0) {
							// convert quadratic points to cubic points
							$x1 = $params[($ck - 3)] + $xoffset;
							$y1 = $params[($ck - 2)] + $yoffset;
							$xa = ($x + (2 * $x1)) / 3;
							$ya = ($y + (2 * $y1)) / 3;
							$x = $params[($ck - 1)] + $xoffset;
							$y = $params[($ck)] + $yoffset;
							$xb = ($x + (2 * $x1)) / 3;
							$yb = ($y + (2 * $y1)) / 3;
							$this->_outCurve($xa, $ya, $xb, $yb, $x, $y);
							$xmin = min($xmin, $x, $xa, $xb);
							$ymin = min($ymin, $y, $ya, $yb);
							$xmax = max($xmax, $x, $xa, $xb);
							$ymax = max($ymax, $y, $ya, $yb);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'T': { // shorthand/smooth quadratic Bezier curveto
					foreach ($params as $ck => $cp) {
						$params[$ck] = $cp;
						if (($ck % 2) != 0) {
							if (($key > 0) AND ((strtoupper($paths[($key - 1)][1]) == 'Q') OR (strtoupper($paths[($key - 1)][1]) == 'T'))) {
								$x1 = (2 * $x) - $x1;
								$y1 = (2 * $y) - $y1;
							} else {
								$x1 = $x;
								$y1 = $y;
							}
							// convert quadratic points to cubic points
							$xa = ($x + (2 * $x1)) / 3;
							$ya = ($y + (2 * $y1)) / 3;
							$x = $params[($ck - 1)] + $xoffset;
							$y = $params[($ck)] + $yoffset;
							$xb = ($x + (2 * $x1)) / 3;
							$yb = ($y + (2 * $y1)) / 3;
							$this->_outCurve($xa, $ya, $xb, $yb, $x, $y);
							$xmin = min($xmin, $x, $xa, $xb);
							$ymin = min($ymin, $y, $ya, $yb);
							$xmax = max($xmax, $x, $xa, $xb);
							$ymax = max($ymax, $y, $ya, $yb);
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'A': { // elliptical arc
					foreach ($params as $ck => $cp) {
						$params[$ck] = $cp;
						if ((($ck + 1) % 7) == 0) {
							$x0 = $x;
							$y0 = $y;
							$rx = abs($params[($ck - 6)]);
							$ry = abs($params[($ck - 5)]);
							$ang = -$rawparams[($ck - 4)];
							$angle = deg2rad($ang);
							$fa = $rawparams[($ck - 3)]; // large-arc-flag
							$fs = $rawparams[($ck - 2)]; // sweep-flag
							$x = $params[($ck - 1)] + $xoffset;
							$y = $params[$ck] + $yoffset;
							if ((abs($x0 - $x) < $minlen) AND (abs($y0 - $y) < $minlen)) {
								// endpoints are almost identical
								$xmin = min($xmin, $x);
								$ymin = min($ymin, $y);
								$xmax = max($xmax, $x);
								$ymax = max($ymax, $y);
							} else {
								$cos_ang = cos($angle);
								$sin_ang = sin($angle);
								$a = (($x0 - $x) / 2);
								$b = (($y0 - $y) / 2);
								$xa = ($a * $cos_ang) - ($b * $sin_ang);
								$ya = ($a * $sin_ang) + ($b * $cos_ang);
								$rx2 = $rx * $rx;
								$ry2 = $ry * $ry;
								$xa2 = $xa * $xa;
								$ya2 = $ya * $ya;
								$delta = ($xa2 / $rx2) + ($ya2 / $ry2);
								if ($delta > 1) {
									$rx *= sqrt($delta);
									$ry *= sqrt($delta);
									$rx2 = $rx * $rx;
									$ry2 = $ry * $ry;
								}
								$numerator = (($rx2 * $ry2) - ($rx2 * $ya2) - ($ry2 * $xa2));
								if ($numerator < 0) {
									$root = 0;
								} else {
									$root = sqrt($numerator / (($rx2 * $ya2) + ($ry2 * $xa2)));
								}
								if ($fa == $fs){
									$root *= -1;
								}
								$cax = $root * (($rx * $ya) / $ry);
								$cay = -$root * (($ry * $xa) / $rx);
								// coordinates of ellipse center
								$cx = ($cax * $cos_ang) - ($cay * $sin_ang) + (($x0 + $x) / 2);
								$cy = ($cax * $sin_ang) + ($cay * $cos_ang) + (($y0 + $y) / 2);
								// get angles
								$angs = TCPDF_STATIC::getVectorsAngle(1, 0, (($xa - $cax) / $rx), (($cay - $ya) / $ry));
								$dang = TCPDF_STATIC::getVectorsAngle((($xa - $cax) / $rx), (($ya - $cay) / $ry), ((-$xa - $cax) / $rx), ((-$ya - $cay) / $ry));
								if (($fs == 0) AND ($dang > 0)) {
									$dang -= (2 * M_PI);
								} elseif (($fs == 1) AND ($dang < 0)) {
									$dang += (2 * M_PI);
								}
								$angf = $angs - $dang;
								if ((($fs == 0) AND ($angs > $angf)) OR (($fs == 1) AND ($angs < $angf))) {
									// reverse angles
									$tmp = $angs;
									$angs = $angf;
									$angf = $tmp;
								}
								$angs = round(rad2deg($angs), 6);
								$angf = round(rad2deg($angf), 6);
								// covent angles to positive values
								if (($angs < 0) AND ($angf < 0)) {
									$angs += 360;
									$angf += 360;
								}
								$pie = false;
								if (($key == 0) AND (isset($paths[($key + 1)][1])) AND (trim($paths[($key + 1)][1]) == 'z')) {
									$pie = true;
								}
								list($axmin, $aymin, $axmax, $aymax) = $this->_outellipticalarc($cx, $cy, $rx, $ry, $ang, $angs, $angf, $pie, 2, false, ($fs == 0), true);
								$xmin = min($xmin, $x, $axmin);
								$ymin = min($ymin, $y, $aymin);
								$xmax = max($xmax, $x, $axmax);
								$ymax = max($ymax, $y, $aymax);
							}
							if ($relcoord) {
								$xoffset = $x;
								$yoffset = $y;
							}
						}
					}
					break;
				}
				case 'Z': {
					$this->_out('h');
					break;
				}
			}
			$firstcmd = false;
		} // end foreach
		if (!empty($op)) {
			$this->_out($op);
		}
		return array($xmin, $ymin, ($xmax - $xmin), ($ymax - $ymin));
	}

	/**
	 * Return the tag name without the namespace
	 * @param $name (string) Tag name
	 * @protected
	 */
	protected function removeTagNamespace($name) {
		if(strpos($name, ':') !== false) {
			$parts = explode(':', $name);
			return $parts[(sizeof($parts) - 1)];
		}
		return $name;
	}
		
	/**
	 * Sets the opening SVG element handler function for the XML parser. (*** TO BE COMPLETED ***)
	 * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
	 * @param $name (string) The second parameter, name, contains the name of the element for which this handler is called. If case-folding is in effect for this parser, the element name will be in uppercase letters.
	 * @param $attribs (array) The third parameter, attribs, contains an associative array with the element's attributes (if any). The keys of this array are the attribute names, the values are the attribute values. Attribute names are case-folded on the same criteria as element names. Attribute values are not case-folded. The original order of the attributes can be retrieved by walking through attribs the normal way, using each(). The first key in the array was the first attribute, and so on.
	 * @param $ctm (array) tranformation matrix for clipping mode (starting transformation matrix).
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @protected
	 */
	protected function startSVGElementHandler($parser, $name, $attribs, $ctm=array()) {
		$name = $this->removeTagNamespace($name);
		// check if we are in clip mode
		if ($this->svgclipmode) {
			$this->svgclippaths[$this->svgclipid][] = array('name' => $name, 'attribs' => $attribs, 'tm' => $this->svgcliptm[$this->svgclipid]);
			return;
		}
		if ($this->svgdefsmode AND !in_array($name, array('clipPath', 'linearGradient', 'radialGradient', 'stop'))) {
			if (isset($attribs['id'])) {
				$attribs['child_elements'] = array();
				$this->svgdefs[$attribs['id']] = array('name' => $name, 'attribs' => $attribs);
				return;
			}
			if (end($this->svgdefs) !== FALSE) {
				$last_svgdefs_id = key($this->svgdefs);
				if (isset($this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'])) {
					$attribs['id'] = 'DF_'.(count($this->svgdefs[$last_svgdefs_id]['attribs']['child_elements']) + 1);
					$this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'][$attribs['id']] = array('name' => $name, 'attribs' => $attribs);
					return;
				}
			}
			return;
		}
		$clipping = false;
		if ($parser == 'clip-path') {
			// set clipping mode
			$clipping = true;
		}
		// get styling properties
		$prev_svgstyle = $this->svgstyles[max(0,(count($this->svgstyles) - 1))]; // previous style
		$svgstyle = $this->svgstyles[0]; // set default style
		if ($clipping AND !isset($attribs['fill']) AND (!isset($attribs['style']) OR (!preg_match('/[;\"\s]{1}fill[\s]*:[\s]*([^;\"]*)/si', $attribs['style'], $attrval)))) {
			// default fill attribute for clipping
			$attribs['fill'] = 'none';
		}
		if (isset($attribs['style']) AND !TCPDF_STATIC::empty_string($attribs['style']) AND ($attribs['style'][0] != ';')) {
			// fix style for regular expression
			$attribs['style'] = ';'.$attribs['style'];
		}
		foreach ($prev_svgstyle as $key => $val) {
			if (in_array($key, TCPDF_IMAGES::$svginheritprop)) {
				// inherit previous value
				$svgstyle[$key] = $val;
			}
			if (isset($attribs[$key]) AND !TCPDF_STATIC::empty_string($attribs[$key])) {
				// specific attribute settings
				if ($attribs[$key] == 'inherit') {
					$svgstyle[$key] = $val;
				} else {
					$svgstyle[$key] = $attribs[$key];
				}
			} elseif (isset($attribs['style']) AND !TCPDF_STATIC::empty_string($attribs['style'])) {
				// CSS style syntax
				$attrval = array();
				if (preg_match('/[;\"\s]{1}'.$key.'[\s]*:[\s]*([^;\"]*)/si', $attribs['style'], $attrval) AND isset($attrval[1])) {
					if ($attrval[1] == 'inherit') {
						$svgstyle[$key] = $val;
					} else {
						$svgstyle[$key] = $attrval[1];
					}
				}
			}
		}
		// transformation matrix
		if (!empty($ctm)) {
			$tm = $ctm;
		} else {
			$tm = array(1,0,0,1,0,0);
		}
		if (isset($attribs['transform']) AND !empty($attribs['transform'])) {
			$tm = TCPDF_STATIC::getTransformationMatrixProduct($tm, TCPDF_STATIC::getSVGTransformMatrix($attribs['transform']));
		}
		$svgstyle['transfmatrix'] = $tm;
		$invisible = false;
		if (($svgstyle['visibility'] == 'hidden') OR ($svgstyle['visibility'] == 'collapse') OR ($svgstyle['display'] == 'none')) {
			// the current graphics element is invisible (nothing is painted)
			$invisible = true;
		}
		// process tag
		switch($name) {
			case 'defs': {
				$this->svgdefsmode = true;
				break;
			}
			// clipPath
			case 'clipPath': {
				if ($invisible) {
					break;
				}
				$this->svgclipmode = true;
				if (!isset($attribs['id'])) {
					$attribs['id'] = 'CP_'.(count($this->svgcliptm) + 1);
				}
				$this->svgclipid = $attribs['id'];
				$this->svgclippaths[$this->svgclipid] = array();
				$this->svgcliptm[$this->svgclipid] = $tm;
				break;
			}
			case 'svg': {
				// start of SVG object
				if(++$this->svg_tag_depth <= 1) {
					break;
				}
				// inner SVG
				array_push($this->svgstyles, $svgstyle);
				$this->StartTransform();
				$svgX = (isset($attribs['x'])?$attribs['x']:0);
				$svgY = (isset($attribs['y'])?$attribs['y']:0);
				$svgW = (isset($attribs['width'])?$attribs['width']:0);
				$svgH = (isset($attribs['height'])?$attribs['height']:0);
				// set x, y position using transform matrix
				$tm = TCPDF_STATIC::getTransformationMatrixProduct($tm, array( 1, 0, 0, 1, $svgX, $svgY));
				$this->SVGTransform($tm);
				// set clipping for width and height
				$x = 0;
				$y = 0;
				$w = (isset($attribs['width'])?$this->getHTMLUnitToUnits($attribs['width'], 0, $this->svgunit, false):$this->w);
				$h = (isset($attribs['height'])?$this->getHTMLUnitToUnits($attribs['height'], 0, $this->svgunit, false):$this->h);
				// draw clipping rect
				$this->Rect($x, $y, $w, $h, 'CNZ', array(), array());
				// parse viewbox, calculate extra transformation matrix
				if (isset($attribs['viewBox'])) {
					$tmp = array();
					preg_match_all("/[0-9]+/", $attribs['viewBox'], $tmp);
					$tmp = $tmp[0];
					if (sizeof($tmp) == 4) {
						$vx = $tmp[0];
						$vy = $tmp[1];
						$vw = $tmp[2];
						$vh = $tmp[3];
						// get aspect ratio
						$tmp = array();
						$aspectX = 'xMid';
						$aspectY = 'YMid';
						$fit = 'meet';
						if (isset($attribs['preserveAspectRatio'])) {
							if($attribs['preserveAspectRatio'] == 'none') {
								$fit = 'none';
							} else {
								preg_match_all('/[a-zA-Z]+/', $attribs['preserveAspectRatio'], $tmp);
								$tmp = $tmp[0];
								if ((sizeof($tmp) == 2) AND (strlen($tmp[0]) == 8) AND (in_array($tmp[1], array('meet', 'slice', 'none')))) {
									$aspectX = substr($tmp[0], 0, 4);
									$aspectY = substr($tmp[0], 4, 4);
									$fit = $tmp[1];
								}
							}
						}
						$wr = ($svgW / $vw);
						$hr = ($svgH / $vh);
						$ax = $ay = 0;
						if ((($fit == 'meet') AND ($hr < $wr)) OR (($fit == 'slice') AND ($hr > $wr))) {
							if ($aspectX == 'xMax') {
								$ax = (($vw * ($wr / $hr)) - $vw);
							}
							if ($aspectX == 'xMid') {
								$ax = ((($vw * ($wr / $hr)) - $vw) / 2);
							}
							$wr = $hr;
						} elseif ((($fit == 'meet') AND ($hr > $wr)) OR (($fit == 'slice') AND ($hr < $wr))) {
							if ($aspectY == 'YMax') {
								$ay = (($vh * ($hr / $wr)) - $vh);
							}
							if ($aspectY == 'YMid') {
								$ay = ((($vh * ($hr / $wr)) - $vh) / 2);
							}
							$hr = $wr;
						}
						$newtm = array($wr, 0, 0, $hr, (($wr * ($ax - $vx)) - $svgX), (($hr * ($ay - $vy)) - $svgY));
						$tm = TCPDF_STATIC::getTransformationMatrixProduct($tm, $newtm);
						$this->SVGTransform($tm);
					}
				}
				$this->setSVGStyles($svgstyle, $prev_svgstyle);
				break;
			}
			case 'g': {
				// group together related graphics elements
				array_push($this->svgstyles, $svgstyle);
				$this->StartTransform();
				$x = (isset($attribs['x'])?$attribs['x']:0);
				$y = (isset($attribs['y'])?$attribs['y']:0);
				$w = 1;//(isset($attribs['width'])?$attribs['width']:1);
				$h = 1;//(isset($attribs['height'])?$attribs['height']:1);
				$tm = TCPDF_STATIC::getTransformationMatrixProduct($tm, array($w, 0, 0, $h, $x, $y));
				$this->SVGTransform($tm);
				$this->setSVGStyles($svgstyle, $prev_svgstyle);
				break;
			}
			case 'linearGradient': {
				if ($this->pdfa_mode) {
					break;
				}
				if (!isset($attribs['id'])) {
					$attribs['id'] = 'GR_'.(count($this->svggradients) + 1);
				}
				$this->svggradientid = $attribs['id'];
				$this->svggradients[$this->svggradientid] = array();
				$this->svggradients[$this->svggradientid]['type'] = 2;
				$this->svggradients[$this->svggradientid]['stops'] = array();
				if (isset($attribs['gradientUnits'])) {
					$this->svggradients[$this->svggradientid]['gradientUnits'] = $attribs['gradientUnits'];
				} else {
					$this->svggradients[$this->svggradientid]['gradientUnits'] = 'objectBoundingBox';
				}
				//$attribs['spreadMethod']
				if (((!isset($attribs['x1'])) AND (!isset($attribs['y1'])) AND (!isset($attribs['x2'])) AND (!isset($attribs['y2'])))
					OR ((isset($attribs['x1']) AND (substr($attribs['x1'], -1) == '%'))
						OR (isset($attribs['y1']) AND (substr($attribs['y1'], -1) == '%'))
						OR (isset($attribs['x2']) AND (substr($attribs['x2'], -1) == '%'))
						OR (isset($attribs['y2']) AND (substr($attribs['y2'], -1) == '%')))) {
					$this->svggradients[$this->svggradientid]['mode'] = 'percentage';
				} else {
					$this->svggradients[$this->svggradientid]['mode'] = 'measure';
				}
				$x1 = (isset($attribs['x1'])?$attribs['x1']:'0');
				$y1 = (isset($attribs['y1'])?$attribs['y1']:'0');
				$x2 = (isset($attribs['x2'])?$attribs['x2']:'100');
				$y2 = (isset($attribs['y2'])?$attribs['y2']:'0');
				if (isset($attribs['gradientTransform'])) {
					$this->svggradients[$this->svggradientid]['gradientTransform'] = TCPDF_STATIC::getSVGTransformMatrix($attribs['gradientTransform']);
				}
				$this->svggradients[$this->svggradientid]['coords'] = array($x1, $y1, $x2, $y2);
				if (isset($attribs['xlink:href']) AND !empty($attribs['xlink:href'])) {
					// gradient is defined on another place
					$this->svggradients[$this->svggradientid]['xref'] = substr($attribs['xlink:href'], 1);
				}
				break;
			}
			case 'radialGradient': {
				if ($this->pdfa_mode) {
					break;
				}
				if (!isset($attribs['id'])) {
					$attribs['id'] = 'GR_'.(count($this->svggradients) + 1);
				}
				$this->svggradientid = $attribs['id'];
				$this->svggradients[$this->svggradientid] = array();
				$this->svggradients[$this->svggradientid]['type'] = 3;
				$this->svggradients[$this->svggradientid]['stops'] = array();
				if (isset($attribs['gradientUnits'])) {
					$this->svggradients[$this->svggradientid]['gradientUnits'] = $attribs['gradientUnits'];
				} else {
					$this->svggradients[$this->svggradientid]['gradientUnits'] = 'objectBoundingBox';
				}
				//$attribs['spreadMethod']
				if (((!isset($attribs['cx'])) AND (!isset($attribs['cy'])))
					OR ((isset($attribs['cx']) AND (substr($attribs['cx'], -1) == '%'))
					OR (isset($attribs['cy']) AND (substr($attribs['cy'], -1) == '%')))) {
					$this->svggradients[$this->svggradientid]['mode'] = 'percentage';
				} elseif (isset($attribs['r']) AND is_numeric($attribs['r']) AND ($attribs['r']) <= 1) {
					$this->svggradients[$this->svggradientid]['mode'] = 'ratio';
				} else {
					$this->svggradients[$this->svggradientid]['mode'] = 'measure';
				}
				$cx = (isset($attribs['cx']) ? $attribs['cx'] : 0.5);
				$cy = (isset($attribs['cy']) ? $attribs['cy'] : 0.5);
				$fx = (isset($attribs['fx']) ? $attribs['fx'] : $cx);
				$fy = (isset($attribs['fy']) ? $attribs['fy'] : $cy);
				$r = (isset($attribs['r']) ? $attribs['r'] : 0.5);
				if (isset($attribs['gradientTransform'])) {
					$this->svggradients[$this->svggradientid]['gradientTransform'] = TCPDF_STATIC::getSVGTransformMatrix($attribs['gradientTransform']);
				}
				$this->svggradients[$this->svggradientid]['coords'] = array($cx, $cy, $fx, $fy, $r);
				if (isset($attribs['xlink:href']) AND !empty($attribs['xlink:href'])) {
					// gradient is defined on another place
					$this->svggradients[$this->svggradientid]['xref'] = substr($attribs['xlink:href'], 1);
				}
				break;
			}
			case 'stop': {
				// gradient stops
				if (substr($attribs['offset'], -1) == '%') {
					$offset = floatval(substr($attribs['offset'], -1)) / 100;
				} else {
					$offset = floatval($attribs['offset']);
					if ($offset > 1) {
						$offset /= 100;
					}
				}
				$stop_color = isset($svgstyle['stop-color'])?TCPDF_COLORS::convertHTMLColorToDec($svgstyle['stop-color'], $this->spot_colors):'black';
				$opacity = isset($svgstyle['stop-opacity'])?$svgstyle['stop-opacity']:1;
				$this->svggradients[$this->svggradientid]['stops'][] = array('offset' => $offset, 'color' => $stop_color, 'opacity' => $opacity);
				break;
			}
			// paths
			case 'path': {
				if ($invisible) {
					break;
				}
				if (isset($attribs['d'])) {
					$d = trim($attribs['d']);
					if (!empty($d)) {
						$x = (isset($attribs['x'])?$attribs['x']:0);
						$y = (isset($attribs['y'])?$attribs['y']:0);
						$w = (isset($attribs['width'])?$attribs['width']:1);
						$h = (isset($attribs['height'])?$attribs['height']:1);
						$tm = TCPDF_STATIC::getTransformationMatrixProduct($tm, array($w, 0, 0, $h, $x, $y));
						if ($clipping) {
							$this->SVGTransform($tm);
							$this->SVGPath($d, 'CNZ');
						} else {
							$this->StartTransform();
							$this->SVGTransform($tm);
							$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'SVGPath', array($d, 'CNZ'));
							if (!empty($obstyle)) {
								$this->SVGPath($d, $obstyle);
							}
							$this->StopTransform();
						}
					}
				}
				break;
			}
			// shapes
			case 'rect': {
				if ($invisible) {
					break;
				}
				$x = (isset($attribs['x'])?$this->getHTMLUnitToUnits($attribs['x'], 0, $this->svgunit, false):0);
				$y = (isset($attribs['y'])?$this->getHTMLUnitToUnits($attribs['y'], 0, $this->svgunit, false):0);
				$w = (isset($attribs['width'])?$this->getHTMLUnitToUnits($attribs['width'], 0, $this->svgunit, false):0);
				$h = (isset($attribs['height'])?$this->getHTMLUnitToUnits($attribs['height'], 0, $this->svgunit, false):0);
				$rx = (isset($attribs['rx'])?$this->getHTMLUnitToUnits($attribs['rx'], 0, $this->svgunit, false):0);
				$ry = (isset($attribs['ry'])?$this->getHTMLUnitToUnits($attribs['ry'], 0, $this->svgunit, false):$rx);
				if ($clipping) {
					$this->SVGTransform($tm);
					$this->RoundedRectXY($x, $y, $w, $h, $rx, $ry, '1111', 'CNZ', array(), array());
				} else {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'RoundedRectXY', array($x, $y, $w, $h, $rx, $ry, '1111', 'CNZ'));
					if (!empty($obstyle)) {
						$this->RoundedRectXY($x, $y, $w, $h, $rx, $ry, '1111', $obstyle, array(), array());
					}
					$this->StopTransform();
				}
				break;
			}
			case 'circle': {
				if ($invisible) {
					break;
				}
				$r = (isset($attribs['r']) ? $this->getHTMLUnitToUnits($attribs['r'], 0, $this->svgunit, false) : 0);
				$cx = (isset($attribs['cx']) ? $this->getHTMLUnitToUnits($attribs['cx'], 0, $this->svgunit, false) : (isset($attribs['x']) ? $this->getHTMLUnitToUnits($attribs['x'], 0, $this->svgunit, false) : 0));
				$cy = (isset($attribs['cy']) ? $this->getHTMLUnitToUnits($attribs['cy'], 0, $this->svgunit, false) : (isset($attribs['y']) ? $this->getHTMLUnitToUnits($attribs['y'], 0, $this->svgunit, false) : 0));
				$x = ($cx - $r);
				$y = ($cy - $r);
				$w = (2 * $r);
				$h = $w;
				if ($clipping) {
					$this->SVGTransform($tm);
					$this->Circle($cx, $cy, $r, 0, 360, 'CNZ', array(), array(), 8);
				} else {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'Circle', array($cx, $cy, $r, 0, 360, 'CNZ'));
					if (!empty($obstyle)) {
						$this->Circle($cx, $cy, $r, 0, 360, $obstyle, array(), array(), 8);
					}
					$this->StopTransform();
				}
				break;
			}
			case 'ellipse': {
				if ($invisible) {
					break;
				}
				$rx = (isset($attribs['rx']) ? $this->getHTMLUnitToUnits($attribs['rx'], 0, $this->svgunit, false) : 0);
				$ry = (isset($attribs['ry']) ? $this->getHTMLUnitToUnits($attribs['ry'], 0, $this->svgunit, false) : 0);
				$cx = (isset($attribs['cx']) ? $this->getHTMLUnitToUnits($attribs['cx'], 0, $this->svgunit, false) : (isset($attribs['x']) ? $this->getHTMLUnitToUnits($attribs['x'], 0, $this->svgunit, false) : 0));
				$cy = (isset($attribs['cy']) ? $this->getHTMLUnitToUnits($attribs['cy'], 0, $this->svgunit, false) : (isset($attribs['y']) ? $this->getHTMLUnitToUnits($attribs['y'], 0, $this->svgunit, false) : 0));
				$x = ($cx - $rx);
				$y = ($cy - $ry);
				$w = (2 * $rx);
				$h = (2 * $ry);
				if ($clipping) {
					$this->SVGTransform($tm);
					$this->Ellipse($cx, $cy, $rx, $ry, 0, 0, 360, 'CNZ', array(), array(), 8);
				} else {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'Ellipse', array($cx, $cy, $rx, $ry, 0, 0, 360, 'CNZ'));
					if (!empty($obstyle)) {
						$this->Ellipse($cx, $cy, $rx, $ry, 0, 0, 360, $obstyle, array(), array(), 8);
					}
					$this->StopTransform();
				}
				break;
			}
			case 'line': {
				if ($invisible) {
					break;
				}
				$x1 = (isset($attribs['x1'])?$this->getHTMLUnitToUnits($attribs['x1'], 0, $this->svgunit, false):0);
				$y1 = (isset($attribs['y1'])?$this->getHTMLUnitToUnits($attribs['y1'], 0, $this->svgunit, false):0);
				$x2 = (isset($attribs['x2'])?$this->getHTMLUnitToUnits($attribs['x2'], 0, $this->svgunit, false):0);
				$y2 = (isset($attribs['y2'])?$this->getHTMLUnitToUnits($attribs['y2'], 0, $this->svgunit, false):0);
				$x = $x1;
				$y = $y1;
				$w = abs($x2 - $x1);
				$h = abs($y2 - $y1);
				if (!$clipping) {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'Line', array($x1, $y1, $x2, $y2));
					$this->Line($x1, $y1, $x2, $y2);
					$this->StopTransform();
				}
				break;
			}
			case 'polyline':
			case 'polygon': {
				if ($invisible) {
					break;
				}
				$points = (isset($attribs['points'])?$attribs['points']:'0 0');
				$points = trim($points);
				// note that point may use a complex syntax not covered here
				$points = preg_split('/[\,\s]+/si', $points);
				if (count($points) < 4) {
					break;
				}
				$p = array();
				$xmin = 2147483647;
				$xmax = 0;
				$ymin = 2147483647;
				$ymax = 0;
				foreach ($points as $key => $val) {
					$p[$key] = $this->getHTMLUnitToUnits($val, 0, $this->svgunit, false);
					if (($key % 2) == 0) {
						// X coordinate
						$xmin = min($xmin, $p[$key]);
						$xmax = max($xmax, $p[$key]);
					} else {
						// Y coordinate
						$ymin = min($ymin, $p[$key]);
						$ymax = max($ymax, $p[$key]);
					}
				}
				$x = $xmin;
				$y = $ymin;
				$w = ($xmax - $xmin);
				$h = ($ymax - $ymin);
				if ($name == 'polyline') {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'PolyLine', array($p, 'CNZ'));
					if (!empty($obstyle)) {
						$this->PolyLine($p, $obstyle, array(), array());
					}
					$this->StopTransform();
				} else { // polygon
					if ($clipping) {
						$this->SVGTransform($tm);
						$this->Polygon($p, 'CNZ', array(), array(), true);
					} else {
						$this->StartTransform();
						$this->SVGTransform($tm);
						$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h, 'Polygon', array($p, 'CNZ'));
						if (!empty($obstyle)) {
							$this->Polygon($p, $obstyle, array(), array(), true);
						}
						$this->StopTransform();
					}
				}
				break;
			}
			// image
			case 'image': {
				if ($invisible) {
					break;
				}
				if (!isset($attribs['xlink:href']) OR empty($attribs['xlink:href'])) {
					break;
				}
				$x = (isset($attribs['x'])?$this->getHTMLUnitToUnits($attribs['x'], 0, $this->svgunit, false):0);
				$y = (isset($attribs['y'])?$this->getHTMLUnitToUnits($attribs['y'], 0, $this->svgunit, false):0);
				$w = (isset($attribs['width'])?$this->getHTMLUnitToUnits($attribs['width'], 0, $this->svgunit, false):0);
				$h = (isset($attribs['height'])?$this->getHTMLUnitToUnits($attribs['height'], 0, $this->svgunit, false):0);
				$img = $attribs['xlink:href'];
				if (!$clipping) {
					$this->StartTransform();
					$this->SVGTransform($tm);
					$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, $w, $h);
					if (preg_match('/^data:image\/[^;]+;base64,/', $img, $m) > 0) {
						// embedded image encoded as base64
						$img = '@'.base64_decode(substr($img, strlen($m[0])));
					} else {
						// fix image path
						if (!TCPDF_STATIC::empty_string($this->svgdir) AND (($img[0] == '.') OR (basename($img) == $img))) {
							// replace relative path with full server path
							$img = $this->svgdir.'/'.$img;
						}
						if (($img[0] == '/') AND !empty($_SERVER['DOCUMENT_ROOT']) AND ($_SERVER['DOCUMENT_ROOT'] != '/')) {
							$findroot = strpos($img, $_SERVER['DOCUMENT_ROOT']);
							if (($findroot === false) OR ($findroot > 1)) {
								if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
									$img = substr($_SERVER['DOCUMENT_ROOT'], 0, -1).$img;
								} else {
									$img = $_SERVER['DOCUMENT_ROOT'].$img;
								}
							}
						}
						$img = urldecode($img);
						$testscrtype = @parse_url($img);
						if (!isset($testscrtype['query']) OR empty($testscrtype['query'])) {
							// convert URL to server path
							$img = str_replace(K_PATH_URL, K_PATH_MAIN, $img);
						}
					}
					// get image type
					$imgtype = TCPDF_IMAGES::getImageFileType($img);
					if (($imgtype == 'eps') OR ($imgtype == 'ai')) {
						$this->ImageEps($img, $x, $y, $w, $h);
					} elseif ($imgtype == 'svg') {
						// store SVG vars
						$svggradients = $this->svggradients;
						$svggradientid = $this->svggradientid;
						$svgdefsmode = $this->svgdefsmode;
						$svgdefs = $this->svgdefs;
						$svgclipmode = $this->svgclipmode;
						$svgclippaths = $this->svgclippaths;
						$svgcliptm = $this->svgcliptm;
						$svgclipid = $this->svgclipid;
						$svgtext = $this->svgtext;
						$svgtextmode = $this->svgtextmode;
						$this->ImageSVG($img, $x, $y, $w, $h);
						// restore SVG vars
						$this->svggradients = $svggradients;
						$this->svggradientid = $svggradientid;
						$this->svgdefsmode = $svgdefsmode;
						$this->svgdefs = $svgdefs;
						$this->svgclipmode = $svgclipmode;
						$this->svgclippaths = $svgclippaths;
						$this->svgcliptm = $svgcliptm;
						$this->svgclipid = $svgclipid;
						$this->svgtext = $svgtext;
						$this->svgtextmode = $svgtextmode;
					} else {
						$this->Image($img, $x, $y, $w, $h);
					}
					$this->StopTransform();
				}
				break;
			}
			// text
			case 'text':
			case 'tspan': {
				if (isset($this->svgtextmode['text-anchor']) AND !empty($this->svgtext)) {
					// @TODO: unsupported feature
				}
				// only basic support - advanced features must be implemented
				$this->svgtextmode['invisible'] = $invisible;
				if ($invisible) {
					break;
				}
				array_push($this->svgstyles, $svgstyle);
				if (isset($attribs['x'])) {
					$x = $this->getHTMLUnitToUnits($attribs['x'], 0, $this->svgunit, false);
				} elseif ($name == 'tspan') {
					$x = $this->x;
				} else {
					$x = 0;
				}
				if (isset($attribs['dx'])) {
					$x += $this->getHTMLUnitToUnits($attribs['dx'], 0, $this->svgunit, false);
				}
				if (isset($attribs['y'])) {
					$y = $this->getHTMLUnitToUnits($attribs['y'], 0, $this->svgunit, false);
				} elseif ($name == 'tspan') {
					$y = $this->y;
				} else {
					$y = 0;
				}
				if (isset($attribs['dy'])) {
					$y += $this->getHTMLUnitToUnits($attribs['dy'], 0, $this->svgunit, false);
				}
				$svgstyle['text-color'] = $svgstyle['fill'];
				$this->svgtext = '';
				if (isset($svgstyle['text-anchor'])) {
					$this->svgtextmode['text-anchor'] = $svgstyle['text-anchor'];
				} else {
					$this->svgtextmode['text-anchor'] = 'start';
				}
				if (isset($svgstyle['direction'])) {
					if ($svgstyle['direction'] == 'rtl') {
						$this->svgtextmode['rtl'] = true;
					} else {
						$this->svgtextmode['rtl'] = false;
					}
				} else {
					$this->svgtextmode['rtl'] = false;
				}
				if (isset($svgstyle['stroke']) AND ($svgstyle['stroke'] != 'none') AND isset($svgstyle['stroke-width']) AND ($svgstyle['stroke-width'] > 0)) {
					$this->svgtextmode['stroke'] = $this->getHTMLUnitToUnits($svgstyle['stroke-width'], 0, $this->svgunit, false);
				} else {
					$this->svgtextmode['stroke'] = false;
				}
				$this->StartTransform();
				$this->SVGTransform($tm);
				$obstyle = $this->setSVGStyles($svgstyle, $prev_svgstyle, $x, $y, 1, 1);
				$this->x = $x;
				$this->y = $y;
				break;
			}
			// use
			case 'use': {
				if (isset($attribs['xlink:href']) AND !empty($attribs['xlink:href'])) {
					$svgdefid = substr($attribs['xlink:href'], 1);
					if (isset($this->svgdefs[$svgdefid])) {
						$use = $this->svgdefs[$svgdefid];
						if (isset($attribs['xlink:href'])) {
							unset($attribs['xlink:href']);
						}
						if (isset($attribs['id'])) {
							unset($attribs['id']);
						}
						if (isset($use['attribs']['x']) AND isset($attribs['x'])) {
							$attribs['x'] += $use['attribs']['x'];
						}
						if (isset($use['attribs']['y']) AND isset($attribs['y'])) {
							$attribs['y'] += $use['attribs']['y'];
						}
						if (empty($attribs['style'])) {
							$attribs['style'] = '';
						}
						if (!empty($use['attribs']['style'])) {
							// merge styles
							$attribs['style'] = str_replace(';;',';',';'.$use['attribs']['style'].$attribs['style']);
						}
						$attribs = array_merge($use['attribs'], $attribs);
						$this->startSVGElementHandler($parser, $use['name'], $attribs);
						return;
					}
				}
				break;
			}
			default: {
				break;
			}
		} // end of switch
		// process child elements
		if (!empty($attribs['child_elements'])) {
			$child_elements = $attribs['child_elements'];
			unset($attribs['child_elements']);
			foreach($child_elements as $child_element) {
				if (empty($child_element['attribs']['closing_tag'])) {
					$this->startSVGElementHandler('child-tag', $child_element['name'], $child_element['attribs']);
				} else {
					if (isset($child_element['attribs']['content'])) {
						$this->svgtext = $child_element['attribs']['content'];
					}
					$this->endSVGElementHandler('child-tag', $child_element['name']);
				}
			}
		}
	}

	/**
	 * Sets the closing SVG element handler function for the XML parser.
	 * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
	 * @param $name (string) The second parameter, name, contains the name of the element for which this handler is called. If case-folding is in effect for this parser, the element name will be in uppercase letters.
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @protected
	 */
	protected function endSVGElementHandler($parser, $name) {
		$name = $this->removeTagNamespace($name);
		if ($this->svgdefsmode AND !in_array($name, array('defs', 'clipPath', 'linearGradient', 'radialGradient', 'stop'))) {;
			if (end($this->svgdefs) !== FALSE) {
				$last_svgdefs_id = key($this->svgdefs);
				if (isset($this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'])) {
					foreach($this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'] as $child_element) {
						if (isset($child_element['attribs']['id']) AND ($child_element['name'] == $name)) {
							$this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'][$child_element['attribs']['id'].'_CLOSE'] = array('name' => $name, 'attribs' => array('closing_tag' => TRUE, 'content' => $this->svgtext));
							return;
						}
					}
					if ($this->svgdefs[$last_svgdefs_id]['name'] == $name) {
						$this->svgdefs[$last_svgdefs_id]['attribs']['child_elements'][$last_svgdefs_id.'_CLOSE'] = array('name' => $name, 'attribs' => array('closing_tag' => TRUE, 'content' => $this->svgtext));
						return;
					}
				}
			}
			return;
		}
		switch($name) {
			case 'defs': {
				$this->svgdefsmode = false;
				break;
			}
			// clipPath
			case 'clipPath': {
				$this->svgclipmode = false;
				break;
			}
			case 'svg': {
				if (--$this->svg_tag_depth <= 0) {
					break;
				}
			}
			case 'g': {
				// ungroup: remove last style from array
				array_pop($this->svgstyles);
				$this->StopTransform();
				break;
			}
			case 'text':
			case 'tspan': {
				if ($this->svgtextmode['invisible']) {
					// This implementation must be fixed to following the rule:
					// If the 'visibility' property is set to hidden on a 'tspan', 'tref' or 'altGlyph' element, then the text is invisible but still takes up space in text layout calculations.
					break;
				}
				// print text
				$text = $this->svgtext;
				//$text = $this->stringTrim($text);
				$textlen = $this->GetStringWidth($text);
				if ($this->svgtextmode['text-anchor'] != 'start') {
					// check if string is RTL text
					if ($this->svgtextmode['text-anchor'] == 'end') {
						if ($this->svgtextmode['rtl']) {
							$this->x += $textlen;
						} else {
							$this->x -= $textlen;
						}
					} elseif ($this->svgtextmode['text-anchor'] == 'middle') {
						if ($this->svgtextmode['rtl']) {
							$this->x += ($textlen / 2);
						} else {
							$this->x -= ($textlen / 2);
						}
					}
				}
				$textrendermode = $this->textrendermode;
				$textstrokewidth = $this->textstrokewidth;
				$this->setTextRenderingMode($this->svgtextmode['stroke'], true, false);
				if ($name == 'text') {
					// store current coordinates
					$tmpx = $this->x;
					$tmpy = $this->y;
				}
				// print the text
				$this->Cell($textlen, 0, $text, 0, 0, '', false, '', 0, false, 'L', 'T');
				if ($name == 'text') {
					// restore coordinates
					$this->x = $tmpx;
					$this->y = $tmpy;
				}
				// restore previous rendering mode
				$this->textrendermode = $textrendermode;
				$this->textstrokewidth = $textstrokewidth;
				$this->svgtext = '';
				$this->StopTransform();
				if (!$this->svgdefsmode) {
					array_pop($this->svgstyles);
				}
				break;
			}
			default: {
				break;
			}
		}
	}

	/**
	 * Sets the character data handler function for the XML parser.
	 * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
	 * @param $data (string) The second parameter, data, contains the character data as a string.
	 * @author Nicola Asuni
	 * @since 5.0.000 (2010-05-02)
	 * @protected
	 */
	protected function segSVGContentHandler($parser, $data) {
		$this->svgtext .= $data;
	}

	// --- END SVG METHODS -----------------------------------------------------

} // END OF TCPDF CLASS

//============================================================+
// END OF FILE
//============================================================+
