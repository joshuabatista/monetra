
<div class="hidden p-4 rounded-lg mb-10" id="pagarReceber" role="tabpanel" aria-labelledby="PagarReceber-tab">

    <div class="flex justify-start mt-0 mb-4 ml-4 text-zinc-500">
        <?php include(__DIR__ . '/../drawer/publico-drawer-pagar-receber.php'); ?>
    </div>

    <div class="infoSemPendentes hidden">
        <div class="text-center italic text-gray-600">
            <p>Nenhum Pagamento / Recebimento a ser aprovado</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 containerPendentes">
        <!-- Renderizado dincamicamente -->
    </div>


</div>

<script src="/src/modulos/publico/assets/js/publico-pagar-receber.js"></script>