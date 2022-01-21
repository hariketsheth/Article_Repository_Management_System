<?php

require('fpdf.php');



class PDF_MySQL_Table extends FPDF

{

protected $ProcessingTable=false;

protected $aCols=array();

protected $TableX;

protected $HeaderColor;

protected $RowColors;

protected $ColorIndex;



function Header()

{

    // Print the table header if necessary

    if($this->ProcessingTable)

        $this->TableHeader();

}



function TableHeader()

{

    $this->SetFont('Arial','B',12);

    $this->SetX($this->TableX);

    $fill=!empty($this->HeaderColor);

    if($fill)

        $this->SetFillColor($this->HeaderColor[0],$this->HeaderColor[1],$this->HeaderColor[2]);

    foreach($this->aCols as $col)

        $this->Cell($col['w'],10,$col['c'],10,0,'C',$fill);

    $this->Ln();

}

function WordWrap(&$text, $maxwidth)

{

    $text = trim($text);

    if ($text==='')

        return 0;

    $space = $this->GetStringWidth(' ');

    $lines = explode("\n", $text);

    $text = '';

    $count = 0;



    foreach ($lines as $line)

    {

        $words = preg_split('/ +/', $line);

        $width = 0;



        foreach ($words as $word)

        {

            $wordwidth = $this->GetStringWidth($word);

            if ($wordwidth > $maxwidth)

            {

                // Word is too long, we cut it

                for($i=0; $i<strlen($word); $i++)

                {

                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));

                    if($width + $wordwidth <= $maxwidth)

                    {

                        $width += $wordwidth;

                        $text .= substr($word, $i, 1);

                    }

                    else

                    {

                        $width = $wordwidth;

                        $text = rtrim($text)."\n".substr($word, $i, 1);

                        $count++;

                    }

                }

            }

            elseif($width + $wordwidth <= $maxwidth)

            {

                $width += $wordwidth + $space;

                $text .= $word.' ';

            }

            else

            {

                $width = $wordwidth + $space;

                $text = rtrim($text)."\n".$word.' ';

                $count++;

            }

        }

        $text = rtrim($text)."\n";

        $count++;

    }

    $text = rtrim($text);

    return $count;

}

function Row($data)

{

    $this->SetX($this->TableX);

    $ci=$this->ColorIndex;

    $fill=!empty($this->RowColors[$ci]);

    if($fill)

        $this->SetFillColor($this->RowColors[$ci][0],$this->RowColors[$ci][1],$this->RowColors[$ci][2]);

    foreach($this->aCols as $col)

        $this->Cell($col['w'],15,WordWrap($data[$col['f']], 2000),5,0,$col['a'],$fill);

    $this->Ln();

    $this->ColorIndex=1-$ci;

}



function CalcWidths($width, $align)

{

    // Compute the widths of the columns

    $TableWidth=0;

    foreach($this->aCols as $i=>$col)

    {

        $w=$col['w'];

        if($w==-1)

            $w=$width/count($this->aCols);

        elseif(substr($w,-1)=='%')

            $w=$w/100*$width;

        $this->aCols[$i]['w']=$w;

        $TableWidth+=$w;

    }

    // Compute the abscissa of the table

    if($align=='C')

        $this->TableX=max(($this->w-$TableWidth+20)/2,0);

    elseif($align=='R')

        $this->TableX=max($this->w-$this->rMargin-$TableWidth+20,0);

    else

        $this->TableX=$this->lMargin-20;

}



function AddCol($field=-1, $width=-1, $caption='', $align='L')

{

    // Add a column to the table

    if($field==-1)

        $field=count($this->aCols);

    $this->aCols[]=array('f'=>$field,'c'=>$caption,'w'=>$width,'a'=>$align);

}



function Table($link, $query, $prop=array())

{

    // Execute query

    $res=mysqli_query($link,$query) or die('Error: '.mysqli_error($link)."<br>Query: $query");

    // Add all columns if none was specified

    if(count($this->aCols)==0)

    {

        $nb=mysqli_num_fields($res);

        for($i=0;$i<$nb;$i++)

            $this->AddCol();

    }

    // Retrieve column names when not specified

    foreach($this->aCols as $i=>$col)

    {

        if($col['c']=='')

        {

            if(is_string($col['f']))

                $this->aCols[$i]['c']=ucfirst($col['f']);

            else

                $this->aCols[$i]['c']=ucfirst(mysqli_fetch_field_direct($res,$col['f'])->name);

        }

    }

    // Handle properties

    if(!isset($prop['width']))

        $prop['width']=0;

    if($prop['width']==0)

        $prop['width']=$this->w-$this->lMargin-$this->rMargin;

    if(!isset($prop['align']))

        $prop['align']='C';

    if(!isset($prop['padding']))

        $prop['padding']=$this->cMargin;

    $cMargin=$this->cMargin;

    $this->cMargin=$prop['padding'];

    if(!isset($prop['HeaderColor']))

        $prop['HeaderColor']=array();

    $this->HeaderColor=$prop['HeaderColor'];

    if(!isset($prop['color1']))

        $prop['color1']=array();

    if(!isset($prop['color2']))

        $prop['color2']=array();

    $this->RowColors=array($prop['color1'],$prop['color2']);

    // Compute column widths

    $this->CalcWidths($prop['width'],$prop['align']);

    // Print header

    $this->TableHeader();

    // Print rows

    $this->SetFont('Arial','',11);

    $this->ColorIndex=0;

    $this->ProcessingTable=true;

    while($row=mysqli_fetch_array($res))

        $this->Row($row);

    $this->ProcessingTable=false;

    $this->cMargin=$cMargin;

    $this->aCols=array();

}

}
