<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="midia.aspx.cs" Inherits="portal.admin.midia" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            Código:<asp:TextBox ID="txtCodigo" runat="server" Height="22px"></asp:TextBox>
            <asp:Button ID="Button4" runat="server" OnClick="Pesquisar" Text="Pesquisar" />
            <br />
            <br />
            Nome:<asp:TextBox ID="txtNome" runat="server"></asp:TextBox>
            <br />
            <br />
            Url:<asp:TextBox ID="txtUrl" runat="server"></asp:TextBox>
            <br />
            <br />
            Data:<asp:TextBox ID="txtData" runat="server"></asp:TextBox>
            <br />
            <br />
            <asp:Button ID="Button1" runat="server" OnClick="Salvar" Text="Salvar" />
            <asp:Button ID="Button2" runat="server" OnClick="Alterar" Text="Alterar" />
            <asp:Button ID="Button3" runat="server" OnClick="Excluir" Text="Excluir" />
        </div>
    </form>
</body>
</html>
