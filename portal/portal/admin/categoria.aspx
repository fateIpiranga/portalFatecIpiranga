<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="categoria.aspx.cs" Inherits="portal.admin.categoria" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            Código<asp:TextBox ID="txtCodigo" runat="server"></asp:TextBox>
            <asp:Button ID="Button4" runat="server" Text="Pesquisar" OnClick="Pesquisar" />
            <br />
            <br />
            Tipo<asp:TextBox ID="txtTipo" runat="server"></asp:TextBox>
            <br />
            <br />
            Descritivo<asp:TextBox ID="txtDescritivo" runat="server"></asp:TextBox>
        </div>
        <asp:Button ID="Button2" runat="server" OnClick="Salvar" Text="Salvar" />
        <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text="Alterar" />
        <asp:Button ID="Button3" runat="server" Text="Excluir" Height="26px" OnClick="Excluir" />
    </form>
</body>
</html>
