<?php
  $path = 'source';

  $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
  
  $bookFiles = [];
  
  foreach($objects as $name => $object){
    if ($object->isDir()) {
      continue;
    }
    if ($object->getExtension() !== 'md') {
      continue;
    }
    $bookFiles[] = $name;
  }
  $str = implode("\n", $bookFiles);
  
  file_put_contents("Book.txt", $str);
?>