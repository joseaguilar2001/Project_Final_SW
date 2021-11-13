<?php
    ob_start();
?>
<table class="table" width="100%" id="tabla">
  <thead>
      <tr>
          <th><abbr title="IdAbas">IdAbas</abbr></th>
          <th><abbr title="IdProveedor">IdProveedor</abbr></th>
          <th><abbr title="IdProducto">IdProducto</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="AbasDate">Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdAbas">IdAbas</abbr></th>
        <th><abbr title="IdProveedor">IdProveedor</abbr></th>
        <th><abbr title="IdProducto">IdProducto</abbr></th>
        <th><abbr title="Cantidad">Cantidad</abbr></th>
        <th><abbr title="AbasDate">Fecha</abbr></th>
        <th><abbr title="Estado">Estado</abbr></th>
        <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($abas as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->Idbas; ?></td>
        <td><?php echo $a->IdProveedor; ?></td>
        <td><?php echo $a->IdProducto; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
        <td><?php echo $a->AbasDate; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->Idbas; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->Idbas; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
    </table>
<?php
    $html = ob_get_clean();
    echo $html;
    require_once './Lib/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);
    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('letter');
    $dompdf -> render();
    $output = $dompdf -> output();
    $filename = 'reporte_Abas.pdf';
    $result = file_put_contents($filename, $output);
    error_reporting(E_ALL ^ E_NOTICE);
    if($result)
    {
        $dompdf -> stream($filename, array("Attachment" => true));
    }
    else 
    {

    }
    $dompdf -> stream($filename, array("Attachment" => false));
    exit();
?>