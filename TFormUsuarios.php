<?php

/**
 * Description of TFormsUsuarios
 *
 * @author hudsonmartins
 */


include_once 'TPage.class.php';
include_once 'bs/TBootstrapCommon.class.php';
include_once 'bs/TBootstrapPanel.class.php';
include_once 'bs/TBootstrapGrid.class.php';
include_once 'bs/TBootstrapGridCell.class.php';
include_once 'bs/TBootstrapButton.class.php';
include_once 'bs/TBootstrapCarousel.class.php';
include_once 'bs/TBootstrapEdit.class.php';
include_once 'bs/TBootstrapPanel.class.php';
include_once 'bs/TBootstrapPanelFooter.class.php';
include_once 'bs/TBootstrapSelect.class.php';

class TFormUsuarios extends TPage {
    public function prepare() {
        $this->loadScripts();
        
        /**
         * Formulário com a lista dos usuários
         */
        $btnUsersAtivos      = new TBootstrapButton("btnUsersAtivos", "Exibir Usuários Ativos");
        $btnUsersInativos    = new TBootstrapButton("btnUsersInativos", "Exibir Usuários Inátivos");
        $btnFechar           = new TBootstrapButton("btnFechar", "Fechar", "btn-warning");
        $btnAdicionarUsuario = new TBootstrapButton("btnAdicionarUsuario", "Novo Usuário", "btn-primary");
        $btnConsultarUsuario  = new TBootstrapButton("btnConsultarUsuario", "Consultar");
        $btnAdicionarUsuario->addImage("glyphicon-file");
        $btnConsultarUsuario->addImage("glyphicon-search");
        
        $itemBtnUsuarios = new TBootstrapGridCell();
        $itemBtnUsuarios->addItem("&nbsp;");
        $itemBtnUsuarios->addItem($btnUsersAtivos);
        $itemBtnUsuarios->addItem($btnUsersInativos);
        $itemBtnUsuarios->addItem("&nbsp;&nbsp;|&nbsp;&nbsp;");
        $itemBtnUsuarios->addItem($btnAdicionarUsuario);
        $itemBtnUsuarios->addItem($btnConsultarUsuario);
        $itemBtnUsuarios->addItem("&nbsp;&nbsp;|&nbsp;&nbsp;");
        $itemBtnUsuarios->addItem($btnFechar);
        $itemBtnUsuarios->addItem("<br><br>");        
        
        $itemGridUsuarios = new TBootstrapGridCell();
        $itemGridUsuarios->setWidth("col-md-12");
        $itemGridUsuarios->addItem("<table class='table table-striped' id='grdUsuarios'>
                                        <thead>
                                            <tr>
                                                <th>nome</th>
                                                <th>email</th>
                                                <th>grupo</th>
                                                <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody id='grdListaUsuarios'></tbody>
                                    </table>");
        
        
        $formUsuarios = new TBootstrapGrid();
        $formUsuarios->addItem($itemBtnUsuarios);
        $formUsuarios->addItem($itemGridUsuarios);
        
        $panelListaUsuarios = new TBootstrapPanel();
        $panelListaUsuarios->setTitle("Usuários", TRUE);
        $panelListaUsuarios->addItem($formUsuarios);
        
        /**
         * Formulário de Detalhes do Usuario
         */
        $ttEdit          = new TTypeEdit();
                
        $edtNome         = new TBootstrapEdit("edtNome", $ttEdit->get()->text, "", "form-control");
        $edtCPF          = new TBootstrapEdit("edtCPF", $ttEdit->get()->text, "", "form-control");
        
        $edtEndereco     = new TBootstrapEdit("edtEndereco", $ttEdit->get()->text, "", "form-control");
        $edtBairro       = new TBootstrapEdit("edtBairro", $ttEdit->get()->text, "", "form-control");
        $edtNumero       = new TBootstrapEdit("edtNumero", $ttEdit->get()->text, "", "form-control");
        $edtComplemento  = new TBootstrapEdit("edtComplemento", $ttEdit->get()->text, "", "form-control");
        //$edtCEP          = new TBootstrapEdit("edtCEP", $ttEdit->get()->text, "", "form-control");

        $edtCidade       = new TBootstrapEdit("edtCidade", $ttEdit->get()->text, "", "form-control");
        $edtUF           = new TBootstrapEdit("edtUF", $ttEdit->get()->text, "", "form-control");
        
        $ddlUF           = new TBootstrapSelect("ddlUF", false, "form-control");
        $ddlCidade       = new TBootstrapSelect("ddlCidade", false, "form-control");
        
        $edtEmailPessoal = new TBootstrapEdit("edtEmailPessoal", $ttEdit->get()->email, "", "form-control");
                
        $edtNome->setPlaceholder("Nome Completo");
        $edtCPF->setPlaceholder("CPF");
        
        $edtEndereco->setPlaceholder("Endereço");
        $edtNumero->setPlaceholder("Número");
        
        $edtBairro->setPlaceholder("Bairro");
        $edtComplemento->setPlaceholder("Complemento");
        
        $edtCidade->setPlaceholder("Cidade");
        $edtUF->setPlaceholder("Estado");
        
        $edtEmailPessoal->setPlaceholder("Email Pessoal");
        $edtEmailPessoal->title = "Email Pessoal";
        
        $itemLnHorizontal = new TBootstrapGridCell();
        $itemLnHorizontal->setWidth("col-md-12");
        $itemLnHorizontal->addItem("<hr style='border: 0; height: 0; "
                                 . "border-top: 1px solid rgba(0, 0, 0, 0.1); "
                                 . "border-bottom: 1px solid rgba(255, 255, 255, 0.3);'>");

        $itemNome = new TBootstrapGridCell();
        $itemNome->setWidth("col-md-12");
        $itemNome->addItem($edtNome->show() . "<br>");

        $itemCPF = new TBootstrapGridCell();
        $itemCPF->setWidth("col-md-12");
        $itemCPF->addItem($edtCPF->show() . "<br>");

        $itemEndereco = new TBootstrapGridCell();
        $itemEndereco->setWidth("col-md-9");
        $itemEndereco->addItem($edtEndereco->show() . "<br>");

        $itemNumero = new TBootstrapGridCell();
        $itemNumero->setWidth("col-md-3");
        $itemNumero->addItem($edtNumero->show() . "<br>");

        $itemBairro = new TBootstrapGridCell();
        $itemBairro->setWidth("col-md-12");
        $itemBairro->addItem($edtBairro->show() . "<br>");

        $itemComplemento = new TBootstrapGridCell();
        $itemComplemento->setWidth("col-md-8");
        $itemComplemento->addItem($edtComplemento->show() . "<br>");

        $itemCEP = new TBootstrapGridCell();
        $itemCEP->setWidth("col-md-4");
        $itemCEP->addItem("<div class='input-group'>"
                        . "<input type='text' class='form-control' id='edtCEP' placeholder='00.000-000' maxlength='10'>"
                        . "<span class='input-group-btn'>"
                        . "  <button type='button' class='btn btn-default' id='btnConsultarCEP'>Consultar</button>"
                        . "</span>"
                        . "</div><br>");

        $itemCidade = new TBootstrapGridCell();
        $itemCidade->setWidth("col-md-10");
        $itemCidade->addItem($edtCidade->show() . $ddlCidade->show() . "<br>");

        $itemUf = new TBootstrapGridCell();
        $itemUf->setWidth("col-md-2");
        $itemUf->addItem($edtUF->show() . $ddlUF->show() . "<br>");

        $itemEmailPessoal = new TBootstrapGridCell();
        $itemEmailPessoal->setWidth("col-md-12");
        $itemEmailPessoal->addItem($edtEmailPessoal->show() . "<br>");
        
        $itemDlgStatus = new TBootstrapGridCell();
        $itemDlgStatus->setWidth("col-md-12");
        $itemDlgStatus->addItem("<div id='dlgStatus' class='alert alert-success' role='alert'>" . 
                                "<i class='fa fa-spinner fa-pulse fa-1x fa-fw'></i>" .
                                "<strong>Aguarde</strong>, carregando dados do registro selecionado...</div>");

        $formDetalhes = new TBootstrapGrid();
        $formDetalhes->addItem($itemDlgStatus);

        $formDetalhes->addItem($itemLnHorizontal);
        $formDetalhes->addItem($itemNome);
        $formDetalhes->addItem($itemCPF);
        $formDetalhes->addItem($itemEndereco);
        $formDetalhes->addItem($itemNumero);
        $formDetalhes->addItem($itemBairro);
        $formDetalhes->addItem($itemComplemento);
        $formDetalhes->addItem($itemCEP);
        $formDetalhes->addItem($itemUf);
        $formDetalhes->addItem($itemCidade);
        $formDetalhes->addItem($itemEmailPessoal);

        $panelDetalhesUsuario = new TBootstrapPanel();
        $panelDetalhesUsuario->setTitle("Detalhes do Usuário", TRUE);
        $panelDetalhesUsuario->addItem($formDetalhes);
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIDGrp'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIDDUs'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIDEnd'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIDCid'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIDEst'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdLat'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdLng'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdIBGE'>");
        $panelDetalhesUsuario->addItem("<input type='hidden' id='hdFormState' value='i'>"); //i: Insert; e: Edit
        
        $btnSalvarDetalhes  = new TBootstrapButton("btnSalvarDetalhes", "Salvar Alterações", "btn-primary");
        $btnFecharDetalhes  = new TBootstrapButton("btnFecharDetalhes", "Fechar");
        $btnAlterarDetalhes = new TBootstrapButton("btnAlterarDetalhes", "Alterar Registro");

        $btnSalvarDetalhes->addImage("glyphicon-floppy-save");
        $btnFecharDetalhes->addImage("glyphicon-off");
        $btnAlterarDetalhes->addImage("glyphicon-pencil");

        $ftPanelDetalhes = new TBootstrapPanelFooter();
        $ftPanelDetalhes->addItem($btnSalvarDetalhes);
        $ftPanelDetalhes->addItem($btnFecharDetalhes);
        $ftPanelDetalhes->addItem("&nbsp;&nbsp;|&nbsp;&nbsp;");
        $ftPanelDetalhes->addItem($btnAlterarDetalhes);

        $panelDetalhesUsuario->setFooter($ftPanelDetalhes);
        
        /**
         * Form Cadastro/Edição de Login e Senha
         */
        $ddlGrupoLogin  = new TBootstrapSelect("ddlGrupoLogin", false, "form-control");
        $edtEmailLogin  = new TBootstrapEdit("edtEmailLogin", $ttEdit->get()->email, "Email", "form-control");
        $edtSenhaAntiga = new TBootstrapEdit("edtSenhaAntiga", $ttEdit->get()->password, "Senha Antiga", "form-control");
        $edtNovaSenha   = new TBootstrapEdit("edtNovaSenha", $ttEdit->get()->password, "Nova Senha", "form-control");
        $edtCheckSenha  = new TBootstrapEdit("edtCheckSenha", $ttEdit->get()->password, "Confirme a Senha", "form-control");
        
        
        $itemGrupoLogin = new TBootstrapGridCell();
        $itemGrupoLogin->setWidth("col-md-12");
        $itemGrupoLogin->addItem($ddlGrupoLogin);
        
        $itemEmailLogin = new TBootstrapGridCell();
        $itemEmailLogin->setWidth("col-md-12");
        $itemEmailLogin->addItem($edtEmailLogin);
        
        $itemSenhaAntiga = new TBootstrapGridCell();
        $itemSenhaAntiga->setWidth("col-md-12");
        $itemSenhaAntiga->addItem($edtSenhaAntiga);
        
        $itemSenhaNova = new TBootstrapGridCell();
        $itemSenhaNova->setWidth("col-md-12");
        $itemSenhaNova->addItem($edtNovaSenha);
        
        $itemCheckSenha = new TBootstrapGridCell();
        $itemCheckSenha->setWidth("col-md-12");
        $itemCheckSenha->addItem($edtCheckSenha);
        
        $itemDlgStatusLogin = new TBootstrapGridCell();
        $itemDlgStatusLogin->setWidth("col-md-12");
        $itemDlgStatusLogin->addItem("<div id='dlgStatusLogin' class='alert alert-success' role='alert'>" . 
                                     "<i class='fa fa-spinner fa-pulse fa-1x fa-fw'></i>" .
                                     "<strong>Aguarde</strong>, carregando dados do registro selecionado...</div>");
        
        $formNovoLogin = new TBootstrapGrid();
        $formNovoLogin->addItem($itemDlgStatusLogin);
        $formNovoLogin->addItem($itemGrupoLogin);
        $formNovoLogin->addItem($itemLnHorizontal);
        $formNovoLogin->addItem($itemEmailLogin);
        $formNovoLogin->addItem($itemSenhaAntiga);
        $formNovoLogin->addItem($itemSenhaNova);
        $formNovoLogin->addItem($itemCheckSenha);
        
        $panelLoginUsuario = new TBootstrapPanel();
        $panelLoginUsuario->setTitle("Dados Login", TRUE);
        $panelLoginUsuario->addItem($formNovoLogin);
        
        $btnSalvarLoginUsuario  = new TBootstrapButton("btnSalvarLogin", "Salvar Edição", "btn-primary");
        $btnFecharLoginUsuario  = new TBootstrapButton("btnFecharLoginUsuario", "Fechar");
        
        $btnSalvarLoginUsuario->addImage("glyphicon-floppy-save");
        $btnFecharLoginUsuario->addImage("glyphicon-off");

        $ftPanelLoginUsuario = new TBootstrapPanelFooter();
        $ftPanelLoginUsuario->addItem($btnSalvarLoginUsuario);
        $ftPanelLoginUsuario->addItem($btnFecharLoginUsuario);
       
        $panelLoginUsuario->setFooter($ftPanelLoginUsuario);
        
        /**
         * TabSheet
         */
        $tbUsuarios = new TBootstrapCarousel("tbUsuarios");
        $tbUsuarios->addPageItem($panelListaUsuarios, true);
        $tbUsuarios->addItem("<div class='row'><div class='col-md-12'>" . 
                             $panelDetalhesUsuario->show() . 
                             "</div></div>");
        $tbUsuarios->addItem("<div class='row'><div class='col-md-12'>" . 
                             $panelLoginUsuario->show() . 
                             "</div></div>");
        
        $areaUsuarios = new TBootstrapGridCell();
        $areaUsuarios->setWidth("col-md-8");
        $areaUsuarios->addItem($tbUsuarios);
        
        $areaPrincipal = new TBootstrapGrid();
        $areaPrincipal->addItem($areaUsuarios);
        $this->addItem($areaPrincipal->show());
    }
}
