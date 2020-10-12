<?php
$color = "#OOOOOO";
$grey = "style='background-color: #eee'";
?>
<table style="font-size: 9px">
    <tr>
        <td colspan="4" align="center">
        <?php if ($empresa->tk_logo != 0) { ?>
            <img style="margin-bottom: 0px;" width="<?php echo $empresa->tk_size_logo; ?>" src="<?php echo base_url() . "uploads/" . $empresa->logotipo; ?>" />
        <?php } ?>
            <h3><?php echo $empresa->nombre; ?></h3><br>
            <?php echo nl2br($empresa->tk_encabezado); ?>
        </td>
    </tr>
    <tr>
        <td colspan="4" align="center">
        </td>
    </tr>

    <tr>
        <td align='center' colspan="4" style="background-color:<?php echo $color; ?>; color: white;">
            <strong>TICKET DE VENTA</strong>
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td>Fecha:</td>
        <td colspan="3"><?php echo  $venta->fecha_creacion;  ?></td>
    </tr>
    <tr>
        <td>Cliente:</td>
        <td colspan="3"><?php //echo $venta->alias;  
                        ?></td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td align='center' colspan="4" style="background-color: #eee;">Detalle de compra
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>
    <tr style="font-size: 7.5px">
        <td width="15%"><strong>Cant</strong></td>
        <td width="35%"><strong>Producto</strong></td>
        <td width="25%"><strong>P/U</strong></td>
        <td width="25%"><strong>Total</strong></td>
    </tr>
    <?php foreach ($detalle as $d) { ?>
        <tr style="font-size: 7.5px">
            <td><?php echo $d->cantidad; ?></td>
            <td><?php echo $d->nombre; ?></td>
            <td>$<?php echo number_format($d->precio_venta, 2); ?></td>
            <td>$<?php echo number_format($d->precio_venta * $d->cantidad, 2); ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="4"></td>
    </tr>
    <tr style="font-size: 8px">
        <td colspan="2">SubTotal: </td>
        <td colspan="2"><strong>$<?php echo number_format($venta->total - $venta->descuento, 2); ?></strong></td>
    </tr>
    <?php if ($venta->descuento > 0) { ?>
        <tr style="font-size: 8px">
            <td colspan="2">Descuento: </td>
            <td colspan="2"><strong>$<?php echo number_format($venta->descuento, 2); ?></strong></td>
        </tr>
    <?php } ?>

    <tr style="font-size: 8px">
        <td colspan="2" style="background-color: #eee;">Total: </td>
        <td colspan="2" style="background-color: #eee;"><strong>$<?php echo number_format($venta->total, 2); ?></strong></td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>

</table>
<p align="center" style="font-size: 9px"><?php echo nl2br($empresa->tk_mensaje); ?><br><br><?php echo nl2br($empresa->tk_pie); ?></p>