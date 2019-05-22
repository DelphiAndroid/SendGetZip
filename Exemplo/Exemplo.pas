unit Exemplo;

interface

uses
  System.SysUtils, System.Types, System.UITypes, System.Classes, System.Variants,
  FMX.Types, FMX.Controls, FMX.Forms, FMX.Graphics, FMX.Dialogs,
  FMX.Controls.Presentation,SendGetZip, FMX.Effects, FMX.Filter.Effects,
  FMX.Edit, FMX.Objects, FMX.StdCtrls, FMX.Layouts, FMX.ListBox, System.Actions,
  FMX.ActnList, FMX.StdActns, FMX.MediaLibrary.Actions,Soap.EncdDecd,System.IOUtils,
  ShowErro, FMX.TabControl, Data.DB, Datasnap.DBClient,
  System.Generics.Collections;

type
  TfExemplo = class(TForm)
    OpenDialog1: TOpenDialog;
    SendGetZip1: TSendGetZip;
    pageControl: TTabControl;
    tabSendData: TTabItem;
    VertScrollBox1: TVertScrollBox;
    layParam: TLayout;
    ListBox1: TListBox;
    Layout4: TLayout;
    btAddParam: TButton;
    btDelParam: TButton;
    Label5: TLabel;
    Label6: TLabel;
    layFile: TLayout;
    ListBox2: TListBox;
    Layout6: TLayout;
    btAddFile: TButton;
    btDelFile: TButton;
    tabCDS_ARTIGO: TTabItem;
    cdsExemplo: TClientDataSet;
    dsExemplo: TDataSource;
    listCDS: TListBox;
    cdsCliente: TClientDataSet;
    Panel1: TPanel;
    btInsertMysql: TButton;
    cdsArtigo: TClientDataSet;
    cdsArtigoart_idusuario: TIntegerField;
    cdsArtigoart_idlinguagem: TIntegerField;
    cdsArtigoart_idcategoria: TIntegerField;
    cdsArtigoart_titulo: TStringField;
    cdsArtigoart_descricao: TStringField;
    ActionList1: TActionList;
    TakePhotoFromLibraryAction1: TTakePhotoFromLibraryAction;
    tabAutenticar: TTabItem;
    tabConfig: TTabItem;
    Panel2: TPanel;
    Label1: TLabel;
    LayoutTop: TLayout;
    Label2: TLabel;
    edToken: TEdit;
    Layout2: TLayout;
    Label4: TLabel;
    edURL: TEdit;
    Layout1: TLayout;
    Label3: TLabel;
    edSenha: TEdit;
    Layout3: TLayout;
    Label7: TLabel;
    edPage: TEdit;
    Button2: TButton;
    Layout5: TLayout;
    Label8: TLabel;
    edSection: TEdit;
    Layout7: TLayout;
    edUserMail: TEdit;
    Layout8: TLayout;
    Label12: TLabel;
    EdUserPassword: TEdit;
    Layout9: TLayout;
    chkUserCreate: TCheckBox;
    btConectar: TButton;
    layoutConectarComToken: TLayout;
    btConectarComToken: TButton;
    Rectangle1: TRectangle;
    Rectangle2: TRectangle;
    Layout10: TLayout;
    btUserRecoverPwd: TButton;
    Layout11: TLayout;
    rdUserRecoverMail: TRadioButton;
    rdUserRecoverPhone: TRadioButton;
    edUserToken: TLabel;
    Rectangle4: TRectangle;
    Layout13: TLayout;
    btAuthCode: TButton;
    edAuthCode: TEdit;
    Label9: TLabel;
    tabModifyUser: TTabItem;
    Layout14: TLayout;
    Label10: TLabel;
    edUserModifyMail: TEdit;
    btUserModifyMail: TButton;
    Layout15: TLayout;
    Label14: TLabel;
    edUserModifyMailAuth: TEdit;
    btUserModifyConfirm: TButton;
    Rectangle5: TRectangle;
    Rectangle6: TRectangle;
    Layout19: TLayout;
    Label17: TLabel;
    edUserModifyPwdAuth: TEdit;
    btUserModifyConfirmPwd: TButton;
    Layout20: TLayout;
    Label18: TLabel;
    edUserModifyPwd: TEdit;
    btUserModifyPwd: TButton;
    cbUserTypeLogin: TComboBox;
    panelAuthActive: TPanel;
    Layout12: TLayout;
    btLoginAuthCodeActive: TButton;
    edLoginAuthCodeActive: TEdit;
    Label11: TLabel;
    Label13: TLabel;
    btLoginAuthCancelar: TButton;
    tabModifyInfoUser: TTabItem;
    Layout16: TLayout;
    Label15: TLabel;
    edInfoUserName: TEdit;
    Layout17: TLayout;
    Layout18: TLayout;
    btUserInfoSave: TButton;
    chkInfoUserAdmin: TCheckBox;
    Layout21: TLayout;
    chkInfoUserSuspender: TCheckBox;
    Layout22: TLayout;
    chkInfoUserActive: TCheckBox;
    Panel3: TPanel;
    Layout23: TLayout;
    Label16: TLabel;
    edArtigoTitulo: TEdit;
    Layout24: TLayout;
    Label19: TLabel;
    edArtigoDescricao: TEdit;
    Layout25: TLayout;
    Label20: TLabel;
    edArtigoLink: TEdit;
    Layout26: TLayout;
    Label21: TLabel;
    cbArtigoCategoria: TComboBox;
    btArtigoCategoriaEdit: TButton;
    tabCDS_CATEGORIA: TTabItem;
    Panel4: TPanel;
    Layout27: TLayout;
    Label22: TLabel;
    edCategoriaLabel: TEdit;
    Layout28: TLayout;
    Label23: TLabel;
    edCategoriaDescricao: TEdit;
    Layout31: TLayout;
    Image1: TImage;
    cdsCategoria: TClientDataSet;
    cdsCategoriacat_id: TAutoIncField;
    cdsCategoriacat_nome: TStringField;
    Panel5: TPanel;
    btInsertCategoria: TButton;
    cdsCategoriacat_descricao: TStringField;
    cdsCategoriacat_remove: TWordField;
    btLoadPicture: TButton;
    OpenDialog2: TOpenDialog;
    Layout30: TLayout;
    Label25: TLabel;
    Edit1: TEdit;
    Layout29: TLayout;
    Image2: TImage;
    Button1: TButton;
    Layout32: TLayout;
    Label24: TLabel;
    Edit2: TEdit;
    Layout33: TLayout;
    Label26: TLabel;
    edArtigoId: TEdit;
    btUpdateMySql: TButton;
    cdsArtigoart_link: TStringField;
    cdsArtigoart_id: TLargeintField;
    procedure Button2Click(Sender: TObject);
    procedure btDelParamClick(Sender: TObject);
    procedure btAddFileClick(Sender: TObject);
    procedure btDelFileClick(Sender: TObject);
    procedure btAddParamClick(Sender: TObject);
    procedure TakePhotoFromLibraryAction1DidFinishTaking(Image: TBitmap);
    procedure SendGetZip1Complete(Sender: TObject;const Param: TStrings; Files: TStrings);
    procedure FormShow(Sender: TObject);
    procedure tabCDS_ARTIGOClick(Sender: TObject);
    procedure tabSendDataClick(Sender: TObject);
    procedure btInsertMysqlClick(Sender: TObject);
    procedure btConectarClick(Sender: TObject);
    procedure btConectarComTokenClick(Sender: TObject);
    procedure btUserRecoverPwdClick(Sender: TObject);
    procedure SendGetZip1Failed(Sender: TObject; ErroCode: Integer;
      ErroMsg: string);
    procedure btAuthCodeClick(Sender: TObject);
    procedure btUserModifyMailClick(Sender: TObject);
    procedure btUserModifyConfirmClick(Sender: TObject);
    procedure btUserModifyPwdClick(Sender: TObject);
    procedure btUserModifyConfirmPwdClick(Sender: TObject);
    procedure cbUserTypeLoginChange(Sender: TObject);
    procedure btLoginAuthCodeActiveClick(Sender: TObject);
    procedure btLoginAuthCancelarClick(Sender: TObject);
    procedure SendGetZip1LoginUser(Sender: TObject; const UserLogin: TUserLogin;
      AuthOK: Boolean);
    procedure SendGetZip1RecoverUser(Sender: TObject;
      const UserLogin: TUserLogin; AuthOK: Boolean);
    procedure SendGetZip1ModifyUser(Sender: TObject;
      const UserLogin: TUserLogin; AuthOK: Boolean);
    procedure btUserInfoSaveClick(Sender: TObject);
    procedure SendGetZip1ReturnCDSAfter(Sender: TObject;
      const sTableName: string; sFieldKey, sFileXML: string;
      sTable: TClientDataSet; sParam: TStrings);
    procedure btInsertCategoriaClick(Sender: TObject);
    procedure btLoadPictureClick(Sender: TObject);
    procedure Button1Click(Sender: TObject);
    procedure btUpdateMySqlClick(Sender: TObject);

  private
    { Private declarations }
  public
    { Public declarations }
    procedure PopulateCombo(const sTableName:string; sTable:TClientDataSet);
    procedure cdsArtigoAfterInsert(DataSet: TDataSet);

  end;

var
  fExemplo: TfExemplo;


function BitmapFromBase64(const base64: string): TBitmap;
function Base64FromBitmap(Bitmap: TBitmap): string;


implementation

{$R *.fmx}
{$R *.Windows.fmx MSWINDOWS}

procedure TfExemplo.cdsArtigoAfterInsert(DataSet: TDataSet);
begin
end;


procedure TfExemplo.Button1Click(Sender: TObject);
begin
  if OpenDialog1.Execute then begin
    Edit2.Text := OpenDialog1.FileName;
    Image2.Bitmap.LoadFromFile(OpenDialog1.FileName);
  end;
end;

procedure TfExemplo.Button2Click(Sender: TObject);
var
i:integer;
begin

  // realiza a limpa dos dados anteriores
  SendGetZip1.Prepare;

  // configura componente
  SendGetZip1.URL             := edURL.Text;
  SendGetZip1.Token           := edToken.Text;
  SendGetZip1.Password        := edSenha.Text;
  SendGetZip1.ParamPage       := edPage.Text;

  {$IFDEF ANDROID}
  SendGetZip1.PathTemp        := TPath.GetDocumentsPath;
  {$ENDIF}

  // adicionar os paramtetros
  for i := 0 to ListBox1.Items.Count-1 do begin
    with TDataItem(SendGetZip1.SendData.Add) do begin
      Name  := ListBox1.ListItems[i].Text;
      Value := ListBox1.ListItems[i].ItemData.Detail;
      DataType := dtString;
    end;
  end;

  // adicionar os paramtetros
  for i := 0 to ListBox2.Items.Count-1 do begin
    with TDataItem(SendGetZip1.SendData.Add) do begin
      Name  := ListBox2.ListItems[i].Text;
      Value := ListBox2.ListItems[i].ItemData.Detail;
      DataType := dtFile;
    end;
  end;

  // envia pacote
  SendGetZip1.SendGet(edSection.Text);

end;

procedure TfExemplo.cbUserTypeLoginChange(Sender: TObject);
begin

  case cbUserTypeLogin.ItemIndex of
    1:edUserMail.Text := 'eulermagalhaes@gmail.com';
    2:edUserMail.Text := '5537991007768';
    3:edUserMail.Text := '11111111111';
  end;

end;

procedure TfExemplo.FormShow(Sender: TObject);
var
  item:TListBoxItem;
begin
  panelAuthActive.Visible := false;

  // inicia atualiza do listbox
  ListBox1.BeginUpdate;

  // instancia um novo objeto
  Item:=TListBoxItem.Create(ListBox1);
  Item.Size.Height := 20;
  Item.ItemData.Detail := '+55 37 991007768';
  item.StyleLookup := 'listboxitemrightdetail';
  Item.Text := 'phone';

  // adiciona novo objeto a lista
  ListBox1.AddObject(item);

  // finalzia atualização do listbox
  ListBox1.EndUpdate;

end;

procedure TfExemplo.PopulateCombo(const sTableName: string;
  sTable: TClientDataSet);
begin
  if sTableName = 'da_categoria2' then begin

    while not sTable.Eof do begin
      cbArtigoCategoria.Items.Add(sTable.FieldByName('cat_id').AsString+'='+sTable.FieldByName('cat_nome').AsString);
      sTable.Next;
    end;
  end;
end;

procedure TfExemplo.SendGetZip1Complete(Sender: TObject;const Param: TStrings; Files: TStrings);
var
  FileCds:string;
begin


  FileCds := TPath.Combine(Param.Values['path'],Param.Values['cds']);

  if FileExists(FileCds) then begin

    cdsExemplo.LoadFromFile(FileCds);
    cdsExemplo.First;

    while not cdsExemplo.eof do begin
      listCDS.Items.Add(cdsExemplo.FieldByName('nome').AsString);
      cdsExemplo.Next;
    end;

  end;

  // exibe os tokens para o usuário, somente para saber que esta sendo atualizado
  edToken.Text := TSendGetZip(Sender).Token;
  edUserToken.Text := TSendGetZip(Sender).Token;

  edInfoUserName.Text := TSendGetZip(Sender).UserLogin.Name;
  chkInfoUserActive.IsChecked := TSendGetZip(Sender).UserLogin.Active;
  chkInfoUserSuspender.IsChecked := TSendGetZip(Sender).UserLogin.Administrador;
  chkInfoUserAdmin.IsChecked := TSendGetZip(Sender).UserLogin.Administrador;


  


end;

procedure TfExemplo.SendGetZip1Failed(Sender: TObject; ErroCode: Integer;
  ErroMsg: string);
begin
  ShowMsgErro(SendGetZip1.MsgErro);


  // agora pega o código e salva na autenticação
  if (TSendGetZip(Sender).UserLogin.Modify.IsUpdate) and (TSendGetZip(Sender).UserLogin.Modify.Code <> '') then begin
    edUserModifyMailAuth.Text := TSendGetZip(Sender).UserLogin.Modify.Code;
    btUserModifyConfirm.Enabled := true;
  end;

  edToken.Text := TSendGetZip(Sender).Token;
  edUserToken.Text := TSendGetZip(Sender).Token;
end;

procedure TfExemplo.SendGetZip1LoginUser(Sender: TObject;
  const UserLogin: TUserLogin; AuthOK: Boolean);
begin

  if AuthOK then begin

    panelAuthActive.Visible := false;
    edLoginAuthCodeActive.Text := '';

  end else begin

    // autenticar a cada login
    if UserLogin.AuthCode <> '' then begin
      panelAuthActive.Visible := true;
      panelAuthActive.Align := TAlignLayout.Client;
      edLoginAuthCodeActive.Text := UserLogin.AuthCode;
    end;

  end;

end;

procedure TfExemplo.SendGetZip1ModifyUser(Sender: TObject;
  const UserLogin: TUserLogin; AuthOK: Boolean);
begin

  // agora pega o código e salva na autenticação
  if AuthOK then begin

    ShowMessage('Campo foi modificado com sucesso!');

  end else begin

    if UserLogin.Modify.Code <> '' then begin
      if UserLogin.Modify.Field = 'Mail' then begin
        edUserModifyMailAuth.Text := UserLogin.Modify.Code;
        btUserModifyConfirm.Enabled := true;
      end else if UserLogin.Modify.Field = 'Password' then begin
        edUserModifyPwdAuth.Text := UserLogin.Modify.Code;
        btUserModifyConfirmPwd.Enabled := true;
      end;
    end;

  end;

end;

procedure TfExemplo.SendGetZip1RecoverUser(Sender: TObject;
  const UserLogin: TUserLogin; AuthOK: Boolean);
begin

  if AuthOK then begin
    ShowMessage('Acesso foi recuperado com sucesso!');
  end else begin

    if UserLogin.Recovery.Code<>'' then begin

      case UserLogin.Recovery.Target of
         sMail:ShowMessage('Enviamos uma mensagem para seu E-mail: Code='+TSendGetZip(Sender).UserLogin.Recovery.Code);
         sPhone:ShowMessage('Enviamos uma mensagem para seu Celular: Code='+TSendGetZip(Sender).UserLogin.Recovery.Code);
         sDoc:ShowMessage('Enviamos uma mensagem para seu E-mail (Doc): Code='+TSendGetZip(Sender).UserLogin.Recovery.Code);
      end;

      // jogamos o codigo para realizar a simulação do mesmo
      edAuthCode.Text := UserLogin.Recovery.Code;

      // ativa bottão para realizar autenticação
      btAuthCode.Enabled := true;

    end;

  end;


end;

procedure TfExemplo.SendGetZip1ReturnCDSAfter(Sender: TObject;
  const sTableName: string; sFieldKey, sFileXML: string; sTable: TClientDataSet;
  sParam: TStrings);
begin

  sTable.First;
  edArtigoId.Text :=  sTable.FieldByName('art_id').AsString
end;

procedure TfExemplo.tabSendDataClick(Sender: TObject);
begin
  edSection.Text := 'phone_exist';
end;

procedure TfExemplo.tabCDS_ARTIGOClick(Sender: TObject);
begin
  edSection.Text := 'table_example';
end;

procedure TfExemplo.TakePhotoFromLibraryAction1DidFinishTaking(Image: TBitmap);
begin

  with TDataItem(SendGetZip1.SendData.Add) do begin
    Name := 'image'+IntToStr(Random(1000))+'.jpg';
    DataType := dtStream;
    Stream := TStringStream.Create();
    Image.SaveToStream(Stream);
  end;

end;

procedure TfExemplo.btAddFileClick(Sender: TObject);
var
  sNome:string;
  sValue:string;
  item:TListBoxItem;
begin
  // inicia atualiza do listbox
  ListBox2.BeginUpdate;

  {$IFDEF ANDROID}
    TakePhotoFromLibraryAction1.Execute;
  {$ENDIF}

  {$IFDEF WIN32}
  // chama caixa de dialogo
  if OpenDialog1.Execute then begin

    // instancia um novo objeto
    Item:=TListBoxItem.Create(ListBox1);
    Item.Size.Height := 20;
    item.StyleLookup := 'listboxitemrightdetail';
    Item.ItemData.Detail := OpenDialog1.FileName;
    Item.Text := ExtractFileName(OpenDialog1.FileName);

    // adiciona novo objeto a lista
    ListBox2.AddObject(item);

  end;
  {$ENDIF}

  // finalzia atualização do listbox
  ListBox2.EndUpdate;

end;

procedure TfExemplo.btAddParamClick(Sender: TObject);
var
  sNome:string;
  sValue:string;
  item:TListBoxItem;
begin
  // inicia atualiza do listbox
  ListBox1.BeginUpdate;

  // captura nome
  {$IFDEF ANDROID}
    sNome:='teste'+IntToStr(Random(1000));
    sValue:='teste'+IntToStr(Random(1000));
  {$ENDIF}

  {$IFDEF WIN32}
    sNome := InputBox('AddParam','Nome:','');
    sValue := InputBox('AddParam','Valor:','');
  {$ENDIF}

  // instancia um novo objeto
  Item:=TListBoxItem.Create(ListBox1);
  Item.Size.Height := 20;
  Item.ItemData.Detail := sValue;
  item.StyleLookup := 'listboxitemrightdetail';
  Item.Text := sNome;

  // adiciona novo objeto a lista
  ListBox1.AddObject(item);

  // finalzia atualização do listbox
  ListBox1.EndUpdate;

end;

procedure TfExemplo.btAuthCodeClick(Sender: TObject);
begin

    SendGetZip1.RecoverAuthCode( edAuthCode.Text );
    edAuthCode.Text := '';

end;

procedure TfExemplo.btConectarClick(Sender: TObject);
var
  userType:TUserType;
begin

  if cbUserTypeLogin.ItemIndex > 0 then begin
    case cbUserTypeLogin.ItemIndex of
      1: userType := sMail;
      2: userType := sPhone;
      3: userType := sDoc;
    end;
    SendGetZip1.Login(edUserMail.Text,edUserPassword.Text,chkUserCreate.IsChecked, userType);
  end else begin
    SendGetZip1.Login(edUserMail.Text,edUserPassword.Text,chkUserCreate.IsChecked);
  end;

  btConectarComToken.Enabled := true;

end;

procedure TfExemplo.btConectarComTokenClick(Sender: TObject);
begin

  SendGetZip1.Prepare;
  SendGetZip1.SendGetURLPage('http://www.delphiandroid.com.br/','webservice/sendgetzip.php','');

end;

procedure TfExemplo.btDelFileClick(Sender: TObject);
var
  i:integer;
  lb: TListboxitem;
begin

  for I := ListBox2.Items.Count-1 downto 0 do begin
    if ListBox2.ListItems[i].IsChecked then begin
      ListBox2.ListItems[i].Free;
    end;
  end;

end;


procedure TfExemplo.btDelParamClick(Sender: TObject);
var
  i:integer;
  lb: TListboxitem;
begin

  for I := ListBox1.Items.Count-1 downto 0 do begin
    if ListBox1.ListItems[i].IsChecked then begin
      ListBox1.ListItems[i].Free;
    end;
  end;

end;


procedure TfExemplo.btInsertCategoriaClick(Sender: TObject);
begin

  if cdsCategoria.IsEmpty then cdsCategoria.CreateDataSet;

  cdsCategoria.Append;
  cdsCategoriacat_nome.AsString := edCategoriaLabel.Text;
  cdsCategoriacat_descricao.AsString := edCategoriaDescricao.Text;
  cdsCategoria.Post;

  SendGetZip1.Prepare;
  SendGetZip1.InsertDB('da_categoria2',cdsCategoria,false);
  SendGetZip1.InsertDBFile('da_categoria2',cdsCategoria.FieldByName('cat_id').AsInteger,Edit1.Text,'foto');
  SendGetZip1.InsertDBFile('da_categoria2',cdsCategoria.FieldByName('cat_id').AsInteger,Edit2.Text,'foto');
  SendGetZip1.LoadTable('da_categoria2','',cdsCategoria,true,PopulateCombo);
  SendGetZip1.SendGetURLPage('http://www.delphiandroid.com.br/','webservice/sendgetzip.php','');

end;

procedure TfExemplo.btLoadPictureClick(Sender: TObject);
begin
  if OpenDialog1.Execute then begin
    edit1.Text := OpenDialog1.FileName;
    Image1.Bitmap.LoadFromFile(OpenDialog1.FileName);
  end;
end;

procedure TfExemplo.btLoginAuthCancelarClick(Sender: TObject);
begin
  panelAuthActive.Visible := false;
  edLoginAuthCodeActive.Text := '';
end;

procedure TfExemplo.btLoginAuthCodeActiveClick(Sender: TObject);
begin

  SendGetZip1.LoginAuth(edLoginAuthCodeActive.Text);

end;

procedure TfExemplo.btUpdateMySqlClick(Sender: TObject);
begin

  // limpa a tabela
  cdsArtigo.Close;      cdsArtigo.CreateDataSet;

  // ajuste para driblar o AutoInc
  cdsArtigo.Append;
  cdsArtigoart_id.AsString          := edArtigoId.Text;
  cdsArtigoart_titulo.AsString      := edArtigoTitulo.Text;
  cdsArtigoart_descricao.AsString   := edArtigoDescricao.Text;
  cdsArtigoart_link.AsString        := edArtigoLink.Text;
  cdsArtigo.Post;

  SendGetZip1.Prepare;
  SendGetZip1.UpdateDB('da_artigo2',cdsArtigo);
  SendGetZip1.SendGetURLPage('http://www.delphiandroid.com.br/','webservice/sendgetzip.php','');

end;

procedure TfExemplo.btUserInfoSaveClick(Sender: TObject);
var
  usu:TSetUserLogin;
begin
  usu.Id              := SendGetZip1.getId;
  usu.Name            := edInfoUserName.Text;
  usu.Administrador   := chkInfoUserAdmin.IsChecked;
  usu.Active          := chkInfoUserActive.IsChecked;
  usu.Suspended       := chkInfoUserSuspender.IsChecked;

  SendGetZip1.setUser(usu);
end;

procedure TfExemplo.btUserModifyConfirmClick(Sender: TObject);
begin

  SendGetZip1.ModifyAuthCode(edUserModifyMailAuth.Text);

end;

procedure TfExemplo.btUserModifyConfirmPwdClick(Sender: TObject);
begin

  SendGetZip1.ModifyAuthCode(edUserModifyPwdAuth.Text);

end;

procedure TfExemplo.btUserModifyMailClick(Sender: TObject);
begin

  SendGetZip1.ModifyMail(edUserModifyMail.Text);


end;

procedure TfExemplo.btUserModifyPwdClick(Sender: TObject);
begin

  SendGetZip1.ModifyPassword(edUserModifyPwd.Text);

end;

procedure TfExemplo.btInsertMysqlClick(Sender: TObject);
begin

  cdsArtigo.Close;
  cdsArtigo.CreateDataSet;

  cdsArtigo.Append;
  cdsArtigoart_idusuario.AsInteger := 1;
  cdsArtigoart_idlinguagem.AsInteger := 10;
  cdsArtigoart_idcategoria.AsInteger := 5;
  cdsArtigoart_titulo.AsString := edArtigoTitulo.Text;
  cdsArtigoart_descricao.AsString := edArtigoDescricao.Text;
  cdsArtigoart_link.AsString := edArtigoLink.Text;
  cdsArtigo.Post;

  SendGetZip1.Prepare;
  SendGetZip1.InsertDB('da_artigo2',cdsArtigo);
  SendGetZip1.SendGetURLPage('http://www.delphiandroid.com.br/','webservice/sendgetzip.php','');
end;

procedure TfExemplo.btUserRecoverPwdClick(Sender: TObject);
begin
  if rdUserRecoverMail.IsChecked then
    SendGetZip1.RecoverPassword( edUserMail.Text, sMail )
  else
    SendGetZip1.RecoverPassword( edUserMail.Text, sPhone );

end;

function Base64FromBitmap(Bitmap: TBitmap): string;
var
  Input: TBytesStream;
  Output: TStringStream;
begin
  Input := TBytesStream.Create;
  try
    Bitmap.SaveToStream(Input);
    Input.Position := 0;
    Output := TStringStream.Create('', TEncoding.ASCII);
    try
      Soap.EncdDecd.EncodeStream(Input, Output);
      Result := Output.DataString;
    finally
      Output.Free;
    end;
  finally
    Input.Free;
  end;
end;

function BitmapFromBase64(const base64: string): TBitmap;
var
  Input: TStringStream;
  Output: TBytesStream;
begin
  Input := TStringStream.Create(base64, TEncoding.ASCII);
  try
    Output := TBytesStream.Create;
    try
      Soap.EncdDecd.DecodeStream(Input, Output);
      Output.Position := 0;
      Result := TBitmap.Create;
      try
        Result.LoadFromStream(Output);
      except
        Result.Free;
        raise;
      end;
    finally
      Output.Free;
    end;
  finally
    Input.Free;
  end;
end;

initialization
ReportMemoryLeaksonShutdown :=true;

end.
