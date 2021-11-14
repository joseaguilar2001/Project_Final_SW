<?php
    ob_start();
?>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProd">IdProducto</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Limite">Limite</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
      </tr>
  </thead>
  <tbody>
    <?php foreach($producto as $prod) { ?>
    <?php if($prod -> Estado != '4' || $prod -> Estado < 4){ ?>
      <tr>
        <td><?php echo $prod->IdProd; ?></td>
        <td><?php echo $prod->Name; ?></td>
        <td><?php echo $prod->Price; ?></td>
        <td><?php echo $prod->Exist; ?></td>
        <td><?php echo $prod->Medida; ?></td>
        <td><?php echo $prod->Limite; ?></td>
        <td><?php echo $prod->DateOff; ?></td>
        <td><?php echo $prod->Estado; ?></td>
      </tr>
      <?php } ?>
    <?php } ?>  
  </tbody>
</table>
<?php
    $html = ob_get_clean();
    echo $html;
    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);
    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('letter');
    $dompdf -> render();
    $output = $dompdf -> output();
    $filename = 'reporte_Productos.pdf';
    $result = file_put_contents($filename, $output);
    error_reporting(E_ALL ^ E_NOTICE);
    if($result)
    {
        $dompdf -> stream($filename, array("Attachment" => false));
    }
    else 
    {
      
    }
    exit();
?>