<%@ Page Title="" Language="C#" MasterPageFile="~/admin/admin.Master" AutoEventWireup="true" CodeBehind="menu.aspx.cs" Inherits="portal.admin.menu" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <h2>Menus - Cadastro de Menus</h2>
    <asp:TextBox ID="txtPesquisar" runat="server"></asp:TextBox><asp:Button ID="Button1" runat="server" Text="Pesquisar" />
    &nbsp;<asp:Button ID="Button2" runat="server" Text="Novo" OnClick="CriarNovo" />
    <br />
    <br />
    <asp:Label ID="lblMensagem" runat="server"></asp:Label>
    <br />
    <asp:GridView ID="GridView1" runat="server">
        <Columns>
            <asp:HyperLinkField DataNavigateUrlFields="codigo" DataNavigateUrlFormatString="detalheMenu.aspx?codigo={0}" HeaderText="Detalher" Text="Ver Mais" />
        </Columns>
    </asp:GridView>
</asp:Content>
