<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="conteudo.aspx.cs" Inherits="Conteudo" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link href="css/conteudo.css" type="text/css" rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cadastrar Conteudo</title>
    <style type="text/css">
        #Text1 {
            width: 291px;
            height: 109px;
        }
        #form1 {
            height: 490px;
        }
    </style>
</head>
<body>
    <h1>Cadastrar Conteúdo</h1>
    <form id="form1" runat="server">
        <div id="formulario1">        
                <asp:Label class="labels" ID="lbCodigo" runat="server" Text="Código"></asp:Label>
                <br />
                <asp:TextBox class="texto-centralizado campos" ID="tbCodigo" runat="server" Width="50%"></asp:TextBox>
                <br />
                <asp:Label class="labels" ID="lbCategoria" runat="server" Text="Categoria"></asp:Label>
                &nbsp;<br />
                <asp:DropDownList class="campos" ID="cbCategoria" runat="server" Height="27px" Width="50%">
                    <asp:ListItem>Selecione...</asp:ListItem>
                </asp:DropDownList>
                <br />
                <asp:Label class="labels" ID="lbTitulo" runat="server" Text="Título"></asp:Label>
                <br />
                <asp:TextBox class="texto-centralizado campos" ID="tbTitulo" runat="server" Height="22px" Width="50%"></asp:TextBox>
                <br />
                <asp:Label class="labels" ID="lbDescritivo" runat="server" Text="Conteúdo"></asp:Label>
                <br />
                <asp:TextBox class="campos" ID="tbDescritivo" runat="server" Height="95px" TextMode="MultiLine" Width="70%"></asp:TextBox>
                <br />
                <br />
                <br />
                <asp:Button ID="btBuscar" runat="server" Text="Buscar" Width="35%" OnClick="buscar" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Button ID="btSalvar" runat="server" Text="Salvar" Width="35%" OnClick="salvar" />
                &nbsp;
                &nbsp;
                <br />         
            <br />
        </div>

        <div id="formulario2">

            <asp:Label class="labels" ID="lbTipo" runat="server" Text="Tipo"></asp:Label>
            <br />
            <asp:DropDownList class="campos" ID="cbTipo" runat="server" Width="50%">
                <asp:ListItem>Selecione...</asp:ListItem>
                <asp:ListItem Value="0">Destaque</asp:ListItem>
                <asp:ListItem Value="1">Conteúdo</asp:ListItem>
                <asp:ListItem Value="2">Notícia</asp:ListItem>
                <asp:ListItem Value="3">Destaque Hotsite</asp:ListItem>
            </asp:DropDownList>
            <br />
                <asp:Label class="labels" ID="lbAlias" runat="server" Text="Alias"></asp:Label>
            <br />
                <asp:TextBox class="texto-centralizado campos" ID="tbAlias" runat="server" Width="50%"></asp:TextBox>
            <br />
                <asp:Label class="labels" ID="lbStatus" runat="server" Text="Status" CssClass="labels"></asp:Label>
            <br />
            
            <asp:DropDownList class="campos" ID="cbStatus" runat="server" Width="50%">
                <asp:ListItem Value="0">Ativo</asp:ListItem>
                <asp:ListItem Value="1">Inativo</asp:ListItem>
            </asp:DropDownList>
                <br />
            <asp:Label class="labels" ID="lbDataPublicado" runat="server" Text="Data de Publicação"></asp:Label>
            <br />
            <asp:TextBox class="texto-centralizado campos" ID="tbDataPublicado" runat="server" TextMode="Date" Width="50%"></asp:TextBox>
            <br />
            <asp:Label class="labels" ID="lbMenuRelacionado" runat="server" Text="Menu Relacionado"></asp:Label>
            <br />
            <asp:DropDownList class="campos" ID="cbMenuRelacionado" runat="server" Width="50%">
                <asp:ListItem>Selecione...</asp:ListItem>
            </asp:DropDownList>
            <br />
            <asp:Label class="labels" ID="lbTags" runat="server" Text="Tags"></asp:Label>
            <br />
            <asp:TextBox class=" texto-centralizado campos" ID="tbTags" runat="server" Width="50%"></asp:TextBox>
            <br />
            <br />
                <asp:Button ID="btAlterar" runat="server" Text="Alterar" OnClick="alterar" Width="35%" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Button ID="btExcluir" runat="server" Text="Excluir" Width="35%" OnClick="excluir" />
            
        </div>

    </form>
</body>
</html>
