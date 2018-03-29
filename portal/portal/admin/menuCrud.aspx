<%@ Page Title="" Language="C#" MasterPageFile="~/admin/admin.Master" AutoEventWireup="true" CodeBehind="menuCrud.aspx.cs" Inherits="portal.admin.menuCrud" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <h2>Menus - Cadastro de Menus</h2>
    codigo:<asp:Label ID="lblCodigo" runat="server"></asp:Label>
    <br />
    nome:<asp:TextBox ID="txtNome" runat="server"></asp:TextBox><br />
    tipo:<asp:DropDownList ID="cboTipo" runat="server">
        <asp:ListItem Value="0">Inativo</asp:ListItem>
        <asp:ListItem Value="1">Ativo</asp:ListItem>
    </asp:DropDownList><br />
    status:<asp:DropDownList ID="cboStatus" runat="server">
        <asp:ListItem Value="0">Principal</asp:ListItem>
        <asp:ListItem Value="1">MenuLateral</asp:ListItem>
        <asp:ListItem Value="2">HotSite</asp:ListItem>
    </asp:DropDownList>
    <br />

    <asp:ScriptManager ID="ScriptManager1" runat="server"></asp:ScriptManager>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>
         <h3>Itens do Menu</h3>
        <p>
            Nome:<asp:TextBox ID="txtNomeItem" runat="server"></asp:TextBox>
            &nbsp;
        </p>
        <p>
            Conteudo:<asp:DropDownList ID="cboConteudo" runat="server">
            </asp:DropDownList>
            &nbsp; Url:
            <asp:TextBox ID="txtUrl" runat="server"></asp:TextBox>
            &nbsp;
            <asp:Button ID="Button2" runat="server" Text="Adicionar" OnClick="adicionarItem" />
        </p>
        <p>
            <asp:GridView ID="GridView1" runat="server">
            </asp:GridView>
        </p>

    </ContentTemplate>

    </asp:UpdatePanel>
    <br />
    <asp:Label ID="lblMensagem" runat="server"></asp:Label>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" OnClick="Inserir" Text="Inserir" />
    <asp:Button ID="Button3" runat="server" OnClick="alterar" Text="Alterar" />
    <br />
    <br />



</asp:Content>
