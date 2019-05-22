unit SendGetZip;

interface

uses
  System.SysUtils, System.Classes,Rest.Types,REST.Client,System.Zip,
  System.IOUtils,IpPeerClient, System.Types,System.NetEncoding, Data.DB, Datasnap.DBClient,IdHashMessageDigest,System.Generics.Collections;

type TDataItemType = (dtString,dtInteger,dtDouble,dtDateTime,dtFile,dtStream);

type
  TDataItem = Class(TCollectionItem)
    private
      FName:string;
      FType:TDataItemType;
      FValue:Variant;
      FStream:TStringStream;
    public

    published
      property Name:string read FName write FName;
      property DataType:TDataItemType read FType write FType;
      property Value:Variant read FValue write FValue;
      property Stream:TStringStream read FStream write FStream;
  End;

type TListDataItem = class(TCollection)
  private
  public
    function Find(Name:string):TDataItem;
end;


TOnComplete = procedure(Sender: TObject;const Param:TStrings; Files:TStrings) of object;
TOnFailed = procedure(Sender: TObject;ErroCode:integer;ErroMsg:string) of object;

TUserType = (sMail,sPhone,sDoc,sNone);


type TUserLoginRecover = record
  IsUpdate:boolean;
  Target:TUserType;
  IP:string;
  Code:string;
  CodeValidate:TDatetime;
  SendMsgCount:integer;
  SendMsgValidade:TDatetime;
end;

type TUserLoginModify = record
  IsUpdate:boolean;
  Field:string;
  FieldValue:string;
  IP:string;
  Code:string;
  CodeValidate:TDatetime;
  SendMsgCount:integer;
  SendMsgValidade:TDatetime;
end;


type TUserLogin = record
  IsUpdate:boolean;
  AuthCode:string;
  Id:integer;
  IdOther:integer;
  Name:string;
  Mail:string;
  Password:string;
  Phone:string;
  TemporaryNumber:string;
  VerifiedMail:boolean;
  VerifiedPhone:boolean;
  Administrador:boolean;
  Active:boolean;
  Suspended:boolean;
  LastVisit:TDatetime;
  Registered:TDatetime;
  LastIP:string;
  Token:string;
  TokenValidate:TDatetime;
  Recovery:TUserLoginRecover;
  Modify:TUserLoginModify;
  // retornar os status das autenticações
  ModifyStatus:boolean;
  RecoverStatus:boolean;
  LoginStatus:boolean;
end;

type TSetUserLogin = record
  Id:integer;
  IdOther:integer;
  Name:string;
  Mail:string;
  Password:string;
  Phone:string;
  Administrador:boolean;
  Active:boolean;
  Suspended:boolean;
end;

TOnEventSimpleCDS = procedure(const sTableName:string; sTable:TClientDataSet) of object;

TReturnCDS = class(TObject)
  public
    CDS:TClientDataSet;
    TableName:string;
    FieldKeyName:string;
    OnExecute:TOnEventSimpleCDS;
end;

TOnModifyUser = procedure(Sender: TObject;const UserLogin:TUserLogin;AuthOK:boolean) of object;
TOnRecoverUser = procedure(Sender: TObject;const UserLogin:TUserLogin;AuthOK:boolean) of object;
TOnLoginUser = procedure(Sender: TObject;const UserLogin:TUserLogin;AuthOK:boolean) of object;
TOnReturnCDSBefore = procedure(Sender: TObject;const sTableName:string; sFieldKey:string; sFileXML:string; sTable:TClientDataSet;var ApplyReload:boolean;sParam:TStrings) of object;
TOnReturnCDSAfter = procedure(Sender: TObject;const sTableName:string; sFieldKey:string; sFileXML:string; sTable:TClientDataSet;sParam:TStrings) of object;
TOnAutentication = procedure(Sender: TObject;const sTOKEN:string; AuthOK:boolean; sParam:TStrings) of object;
TOnFiles = procedure(Sender: TObject;const sFiles:TStrings; sParam:TStrings) of object;
TOnFileReceive = procedure(Sender: TObject;const sFileName:string; sParam:TStrings) of object;

type
  TSendGetZip = class(TComponent)
  private
    { Private declarations }
    FSendData:TListDataItem;
    FGetData:TListDataItem;
    FURL:string;
    FTemp:string;
    FRequest: TRestRequest;
    FResponse: TRestResponse;
    FRestClient: TRestClient;
    FPassword:string;
    FToken:string;
    FMsgErro:string;
    FCodeErro:integer;
    FTimeStamp:string;
    FPage:string;
    FCountQuery:integer;
    FuserName:string;
    FuserPassword:string;
    FuserCreate:boolean;
    FuserToken:string;
    FuserValidToken:TDateTime;

    FListReturnCDS : TObjectList<TReturnCDS>;

    //* EVENTS *//
    FOnComplete:TOnComplete;
    FOnFailed:TOnFailed;
    FOnModifyUser:TOnModifyUser;
    FOnRecoverUser:TOnRecoverUser;
    FOnLoginUser:TOnLoginUser;
    FOnReturnCDSBefore : TOnReturnCDSBefore;
    FOnReturnCDSAfter : TOnReturnCDSAfter;
    FOnAutentication : TOnAutentication;
    FOnFileReceive: TOnFileReceive;
    FOnFiles:TOnFiles;

    procedure PrepareSendPackage;
    function getFileNameTempParam:string;
    function getFileNameTempSend:string;
    function getFileNameTempGet:string;
    function getDirNameTempGet:string;

  protected
    { Protected declarations }
  public
    { Public declarations }
    UserLogin : TUserLogin;
    constructor Create(aowner:Tcomponent); override;
    destructor Destroy(); override;
    procedure SendGet(Section:String); overload;
    procedure SendGet(Section:String;ProcComplete:TOnComplete;ProcFailed:TOnFailed); overload;
    procedure SendGetPage(Page,Section:String); overload;
    procedure SendGetPage(Page,Section:String;ProcComplete:TOnComplete;ProcFailed:TOnFailed); overload;
    procedure SendGetURL(setURL,Section:String); overload;
    procedure SendGetURL(setURL,Section:String;ProcComplete:TOnComplete;ProcFailed:TOnFailed); overload;
    procedure SendGetURLPage(setURL,Page,Section:String); overload;
    procedure SendGetURLPage(setURL,Page,Section:String;ProcComplete:TOnComplete;ProcFailed:TOnFailed); overload;
    function getPathTemp:string;

    procedure setUser(Login:TSetUserLogin);
    procedure setField(sName:string;sValue:Variant;sType:TDataItemType);

    procedure Login(sUser,sPwd:string); overload;
    procedure Login(sUser,sPwd:string;CreateUser:boolean); overload;
    procedure Login(sUser,sPwd:string;CreateUser:boolean;sUSerType:TUserType);overload;
    procedure LoginAuth(sAuth:string);

    procedure RecoverPassword(sUser:string;sTarget:TUserType); overload;
    procedure RecoverPassword(sUser:string;sMsg:string;sTarget:TUserType); overload;
    procedure RecoverAuthCode(sCode:string);

    procedure ModifyMail(sUser:String);
    procedure ModifyPassword(sPwd:String);
    procedure ModifyAuthCode(sCode:string);

    procedure InsertDB(tableName:string;Table:TClientDataSet;ReloadData:boolean=true);
    procedure InsertDBFile(tableName:string;tableId:integer;FileName:string;Directory:string);

    procedure UpdateDB(tableName:string;Table:TClientDataSet;ForceUpdateInsert:boolean=false;ReloadData:boolean=true);
    procedure UpdateDBFile(tableName:string;tableId:integer;FileName:string;Directory:string);

    procedure DeleteDB(tableName:string;FiledName:string;listIds:array of string);
    procedure LoadTable(tableName:string;Where:string;Table:TClientDataSet;LoadFiles:boolean=true; OnExecute:TOnEventSimpleCDS=nil);

    procedure DropTable(tableName:string);
    procedure RenameTable(tableName:string;new_tableName:string);
    procedure Query(cdsTable:TClientDataSet;sQuery:string='';sTableName:string='';sFieldKeyName:string='');

    procedure Prepare;

    function MD5(const texto:string):string;
    function getId:integer;
    procedure AddReturnCDS(sTableName,sFieldKeyName:string;sCDS:TClientDataSet;OnExecute:TOnEventSimpleCDS=nil);
  published
    { Published declarations }
    property SendData : TListDataItem read FSendData write FSendData;
    property GetData : TListDataItem read FGetData write FGetData;
    property URL:string read FURL write FURL;
    property ParamPage:string read FPage write FPage;
    property PathTemp:string read GetPathTemp write FTemp;
    property Password:string read FPassword write FPassword;
    property Token:string read FToken write FToken;
    property MsgErro:string read FMsgErro write FMsgErro;
    property CodeErro:integer read FCodeErro write FCodeErro;
    property ListReturnCDS:TObjectList<TReturnCDS> read FListReturnCDS write FListReturnCDS;

    // * EVENTS * //

    property OnComplete:TOnComplete read FOnComplete write FOnComplete;
    property OnFailed:TOnFailed read FOnFailed write FOnFailed;
    property OnModifyUser:TOnModifyUser read FOnModifyUser write FOnModifyUser;
    property OnRecoverUser:TOnRecoverUser read FOnRecoverUser write FOnRecoverUser;
    property OnLoginUser:TOnLoginUser read FOnLoginUser write FOnLoginUser;
    property OnReturnCDSBefore:TOnReturnCDSBefore read FOnReturnCDSBefore write FOnReturnCDSBefore;
    property OnReturnCDSAfter:TOnReturnCDSAfter read FOnReturnCDSAfter write FOnReturnCDSAfter;
    property OnAutentication:TOnAutentication read FOnAutentication write FOnAutentication;
    property OnFileReceive: TOnFileReceive read FOnFileReceive write FOnFileReceive;
    property OnFiles:TOnFiles read FOnFiles write FOnFiles;

  end;

const
  FileTempNameSend:string = 'tempsend.zip';
  FileTempNameGet:string = 'tempget.zip';
  DirTempNameGet:string = 'tempzip';
  FileTempParam:string = 'param.txt';

procedure Register;

implementation

procedure Register;
begin
  RegisterComponents('DelphiAndroid', [TSendGetZip]);
end;

{ TSendGetZip }


{ TSendGetZip }



procedure TSendGetZip.UpdateDB(tableName: string; Table: TClientDataSet;
  ForceUpdateInsert, ReloadData: boolean);
var
  i:integer;
  existeUpdateDB:boolean;
  fileName:string;
  cdsClone:TClientDataSet;
begin
  //naõ existe
  existeUpdateDB:= false;

  // adicionar os paramtetros para servidor processar esta função
  for I := 0 to Self.SendData.Count-1 do begin
    if TDataItem(Self.SendData.Items[I]).Name = 'UpdateDB' then begin
      TDataItem(Self.SendData.Items[I]).Value := TDataItem(Self.SendData.Items[I]).Value + 1;
      existeUpdateDB := true;
      break;
    end;
  end;

  // caso não exista inicia o insertdb
  if not existeUpdateDB then begin
    setField('UpdateDB',tableName,dtString);
  end;

  if ForceUpdateInsert then
    setField('forceUpdateInsert','yes',dtString);

  // salva o arquivo XML, na pasta temporaria
  cdsClone := TClientDataSet.Create(nil);
  cdsClone.CloneCursor(Table,false);

  for i:= 0 to cdsClone.FieldDefList.Count-1 do begin
    if cdsClone.FieldDefList.FieldDefs[i].DataType = ftLargeint then begin
      setField('UpdateDB_KEY_'+tableName,cdsClone.FieldDefList.FieldDefs[i].Name,dtString);
    end;
  end;

  fileName := 'UpdateDB_'+tableName;
  cdsClone.LogChanges := false;
  cdsClone.MergeChangeLog;
  cdsClone.SaveToFile(TPath.Combine(PathTemp,fileName+'.xml'),dfXMLUTF8);

  setField(fileName,TPath.Combine(PathTemp,fileName+'.xml'),dtFile);

  cdsClone.Free;

  if ReloadData then begin
    setField('UpdateDB_RELOAD_'+tableName,'S',dtString);

    // adiciona a lista de retorno, para ser recarregado
    AddReturnCDS(tableName,'',Table);
  end else begin
    setField('UpdateDB_RELOAD_'+tableName,'N',dtString);
  end;

end;

procedure TSendGetZip.UpdateDBFile(tableName: string; tableId: integer;
  FileName, Directory: string);
var
  existeInsertDB:boolean;
  existeFileDB:boolean;
  i:integer;
begin
  existeInsertDB := false;

  // adicionar os paramtetros para servidor processar esta função
  for I := 0 to Self.SendData.Count-1 do begin
    if TDataItem(Self.SendData.Items[I]).Name = 'UpdateDBFile_'+tableName then begin
      TDataItem(Self.SendData.Items[I]).Value := TDataItem(Self.SendData.Items[I]).Value +'|'+IntToStr(tableId)+';'+ExtractFileName(FileName)+';'+Directory;
      existeInsertDB := true;
      break;
    end;
  end;

  if not existeInsertDB then begin
    setField('UpdateDBFile_'+tableName,IntToStr(tableId)+';'+ExtractFileName(FileName)+';'+Directory,dtString);
  end;

  setField('UpdateDBFILE_'+tableName+'_FILENAME_'+IntToStr(tableId),FileName,dtFile);

end;

procedure TSendGetZip.InsertDB(tableName:string;Table:TClientDataSet;ReloadData:boolean=true);
var
  i:integer;
  existeInsertDB:boolean;
  fileName:string;
  cdsClone:TClientDataSet;
begin
  //naõ existe
  existeInsertDB:= false;

  // adicionar os paramtetros para servidor processar esta função
  for I := 0 to Self.SendData.Count-1 do begin
    if TDataItem(Self.SendData.Items[I]).Name = 'InsertDB' then begin
      TDataItem(Self.SendData.Items[I]).Value := TDataItem(Self.SendData.Items[I]).Value + 1;
      existeInsertDB := true;
      break;
    end;
  end;

  // caso não exista inicia o insertdb
  if not existeInsertDB then begin

    setField('InsertDB',tableName,dtString);
  end;


  // salva o arquivo XML, na pasta temporaria
  cdsClone := TClientDataSet.Create(nil);
  cdsClone.CloneCursor(Table,false);

  for i:= 0 to cdsClone.FieldDefList.Count-1 do begin
    if cdsClone.FieldDefList.FieldDefs[i].DataType = ftLargeint then begin
      setField('InsertDB_KEY_'+tableName,cdsClone.FieldDefList.FieldDefs[i].Name,dtString);
    end;
  end;

  fileName := 'InsertDB_'+tableName;
  cdsClone.SaveToFile(TPath.Combine(PathTemp,fileName+'.xml'),dfXMLUTF8);

  setField(fileName,TPath.Combine(PathTemp,fileName+'.xml'),dtFile);

  cdsClone.Free;

  if ReloadData then begin
    setField('InsertDB_RELOAD_'+tableName,'S',dtString);

    // adiciona a lista de retorno, para ser recarregado
    AddReturnCDS(tableName,'',Table);
  end else begin
    setField('InsertDB_RELOAD_'+tableName,'N',dtString);
  end;

end;

procedure TSendGetZip.InsertDBFile(tableName: string; tableId: integer;
  FileName, Directory: string);
var
  existeInsertDB:boolean;
  existeFileDB:boolean;
  i:integer;
begin
  existeInsertDB := false;

  // adicionar os paramtetros para servidor processar esta função
  for I := 0 to Self.SendData.Count-1 do begin
    if TDataItem(Self.SendData.Items[I]).Name = 'InsertDBFile_'+tableName then begin
      TDataItem(Self.SendData.Items[I]).Value := TDataItem(Self.SendData.Items[I]).Value +'|'+IntToStr(tableId)+';'+ExtractFileName(FileName)+';'+Directory;
      existeInsertDB := true;
      break;
    end;
  end;

  if not existeInsertDB then begin
    setField('InsertDBFile_'+tableName,IntToStr(tableId)+';'+ExtractFileName(FileName)+';'+Directory,dtString);
  end;

  setField('InsertDBFILE_'+tableName+'_FILENAME_'+IntToStr(tableId),FileName,dtFile);

end;

procedure TSendGetZip.Login(sUser, sPwd: string);
begin
  Login(sUser,sPwd,false, sNone);
end;

procedure TSendGetZip.Login(sUser, sPwd: string; CreateUser: boolean);
begin
  Login(sUser,sPwd,CreateUser, sNone);
end;

procedure TSendGetZip.LoadTable(tableName: string; Where:string; Table: TClientDataSet; LoadFiles:boolean=true; OnExecute:TOnEventSimpleCDS=nil);
begin

  // carrega tabela
  setField('LoadTableDB',tableName,dtString);
  setField('LoadTableDB_'+tableName,Where,dtString);

  // adiciona a lista de retorno, para ser recarregado
  AddReturnCDS(tableName,'',Table,OnExecute);

end;

procedure TSendGetZip.Login(sUser, sPwd: string; CreateUser: boolean;sUSerType:TUserType);
begin

  // dispara o prepare
  Prepare;

  FuserName     := sUser;
  FuserPassword := sPwd;
  FuserCreate   := CreateUser;

  // caso não exista inicia o insertdb
  if CreateUser then begin
    setField('_userCreate',1,dtInteger);
  end else begin
    setField('_userCreate',0,dtInteger);
  end;

  setField('_userLoginRun',sUser,dtString);
  setField('_userKey',sUser,dtString);
  case sUSerType of
    sMail : setField('_userType','Mail',dtString);
    sPhone: setField('_userType','Phone',dtString);
    sDoc  : setField('_userType','Doc',dtString);
  end;

  setField('_userPassword',MD5(sPwd),dtString);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.LoginAuth(sAuth:string);
begin

  // dispara o prepare
  Prepare;

  // caso não exista inicia o insertdb
  setField('_userLoginAuthCode',sAuth,dtString);
  setField('_userId',UserLogin.Id,dtInteger);

  // retorna dados do usuario
  SendGet('');

end;

function TSendGetZip.MD5(const texto: string): string;
var
  idmd5 : TIdHashMessageDigest5;
begin

  idmd5 := TIdHashMessageDigest5.Create;

  try
    result := LowerCase(idmd5.HashStringAsHex(texto));
  finally
    idmd5.Free;
  end;

end;

procedure TSendGetZip.ModifyAuthCode(sCode: string);
begin
  // dispara o prepare
  Prepare;

  // caso não exista inicia o insertdb
  setField('_userModifyAuthCode',sCode,dtString);
  setField('_userId',Self.UserLogin.Id,dtInteger);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.ModifyMail(sUser: String);
begin
  // dispara o prepare
  Prepare;

  // caso não exista inicia o insertdb
  setField('_userModify',sUser,dtString);
  setField('_userField','Mail',dtString);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.ModifyPassword(sPwd: String);
begin
  // dispara o prepare
  Prepare;

  // caso não exista inicia o insertdb
  setField('_userModify',sPwd,dtString);
  setField('_userField','Password',dtString);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.RecoverAuthCode(sCode: string);
begin
  // dispara o prepare
  Prepare;

  // caso não exista inicia o insertdb
  setField('_userRecoverAuthCode',sCode,dtString);
  setField('_userId',UserLogin.Id,dtInteger);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.AddReturnCDS(sTableName, sFieldKeyName: string;
  sCDS: TClientDataSet;OnExecute:TOnEventSimpleCDS=nil);
var
  i:integer;
begin
  FListReturnCDS.Add(TReturnCDS.Create);
  i := FListReturnCDS.Count-1;
  FListReturnCDS[i].CDS           := sCDS;
  FListReturnCDS[i].TableName     := sTableName;
  FListReturnCDS[i].FieldKeyName  := sFieldKeyName;
  FListReturnCDS[i].OnExecute     := OnExecute;
end;

constructor TSendGetZip.Create(aowner: Tcomponent);
begin
  inherited;
  FRequest:=TRestRequest.Create(nil);
  FResponse:=TRestResponse.Create(nil);
  FRestClient:=TRestClient.Create(nil);
  FRequest.Client:=FRestClient;
  FRequest.Response:=FResponse;

  FSendData := TListDataItem.Create(TDataItem);
  FGetData := TListDataItem.Create(TDataItem);
  FTimeStamp := FormatDateTime('yyyy-mm-dd_hh-nn-ss_zzz',now);
  FListReturnCDS := TObjectList<TReturnCDS>.Create;
end;

procedure TSendGetZip.DeleteDB(tableName, FiledName: string;
  listIds: array of string);
begin
//
end;

destructor TSendGetZip.Destroy;
begin
  inherited;
  FRequest.free;
  FResponse.free;
  FRestClient.free;

  FSendData.Free;
  FGetData.Free;
  FListReturnCDS.Free;
end;


procedure TSendGetZip.DropTable(tableName: string);
var
  i:integer;
begin

  setField('DropTable',1,dtInteger);

  setField('DropTable_A_'+tableName,tableName,dtString);


end;

function TSendGetZip.getDirNameTempGet: string;
begin
  result := TPath.Combine(PathTemp,DirTempNameGet);
end;

function TSendGetZip.getFileNameTempGet: string;
begin
  result := TPath.Combine(PathTemp,FileTempNameGet);
end;

function TSendGetZip.getFileNameTempParam: string;
begin
  result := TPath.Combine(PathTemp,FileTempParam);
end;

function TSendGetZip.getFileNameTempSend: string;
begin
  result := TPath.Combine(PathTemp,FileTempNameSend);
end;

function TSendGetZip.getId: integer;
begin
  result := UserLogin.Id;
end;

function TSendGetZip.getPathTemp: string;
begin
  result := FTimeStamp;
end;

procedure TSendGetZip.Prepare;
begin

  FListReturnCDS.Clear;

  // pega o tempo atual pra criar uma pasta temporaria
  FTimeStamp := FormatDateTime('yyyy-mm-dd_hh-nn-ss_zzz',now);

  // verifica se o diretorio de extração existe
  if not DirectoryExists(PathTemp) then CreateDir(PathTemp);

  // limpa tudo e prepara para próximo envio
  FSendData.Clear;
  UserLogin.IsUpdate := false;
  UserLogin.AuthCode := '';

  // reinicia status
  UserLogin.ModifyStatus  := false;
  UserLogin.RecoverStatus := false;
  UserLogin.LoginStatus   := false;

  // informações do campo modify
  UserLogin.Modify.IsUpdate := false;
  UserLogin.Modify.Field := '';
  UserLogin.Modify.FieldValue := '';
  UserLogin.Modify.IP := '';
  UserLogin.Modify.Code := '';
  UserLogin.Modify.CodeValidate := 0;
  UserLogin.Modify.SendMsgCount := 0;
  UserLogin.Modify.SendMsgValidade := 0;

  // informações do campo recover
  UserLogin.Recovery.IsUpdate := false;
  UserLogin.Recovery.IP := '';
  UserLogin.Recovery.Code := '';
  UserLogin.Recovery.CodeValidate := 0;
  UserLogin.Recovery.SendMsgCount := 0;
  UserLogin.Recovery.SendMsgValidade := 0;

  // caso não exista inicia o insertdb
  setField('_userToken',FToken,dtString);

end;

procedure TSendGetZip.PrepareSendPackage;
var
//  ZipFile: TEncryptedZipFile;
  ZipFile: TZipFile;
  ZipDocument,ZipTemp:string;// = 'E:\document.zip';
  SS: TStringStream;
  i:integer;
begin

  // marca como não foram atualizados, para verificar se foram atualizados os dados
  UserLogin.IsUpdate          := false;
  UserLogin.Recovery.IsUpdate := false;
  UserLogin.Modify.IsUpdate   := false;

  // cria um nome temporario para o arquivo a ser enviado
  ZipDocument := getFileNameTempSend;

//  ZipFile := TEncryptedZipFile.Create(FPassword); //Zipfile: TZipFile
  ZipFile := TZipFile.Create; //Zipfile: TZipFile

  try
    // remove qualquer passado que existiu
    if FileExists(ZipDocument) then DeleteFile(ZipDocument);

    // começa algo novo
    ZipFile.Open(ZipDocument, zmWrite);

    // cria arquivo que vai enviar os parametros
    SS := TStringStream.Create('');


    // roda lista e adiciona os itens necessários
    for I := 0 to FSendData.Count-1 do begin
      case TDataItem(FSendData.Items[i]).DataType of
        dtString:
          begin
            SS.WriteString(TDataItem(FSendData.Items[i]).Name+'='+TDataItem(FSendData.Items[i]).Value+#13#10);
          end;
        dtInteger:
          begin
            SS.WriteString(TDataItem(FSendData.Items[i]).Name+'='+IntToStr(TDataItem(FSendData.Items[i]).Value)+#13#10);
          end;
        dtDouble:
          begin
            SS.WriteString(TDataItem(FSendData.Items[i]).Name+'='+FloatToStr(TDataItem(FSendData.Items[i]).Value)+#13#10);
          end;
        dtDateTime:
          begin
            SS.WriteString(TDataItem(FSendData.Items[i]).Name+'='+DateTimeToStr(TDataItem(FSendData.Items[i]).Value)+#13#10);
          end;
        dtFile:
          begin
            // monta um arquivo temporario
            if TDataItem(FSendData.Items[i]).Value = '' then
              ZipTemp := TDataItem(FSendData.Items[i]).Name
            else begin
              ZipTemp := TDataItem(FSendData.Items[i]).Value;
              SS.WriteString(TDataItem(FSendData.Items[i]).Name+'='+ExtractFileName(TDataItem(FSendData.Items[i]).Value)+#13#10);
            end;

            // caso o arquivo exista adiciona
            if FileExists(ZipTemp) then ZipFile.Add(ZipTemp);
          end;
        dtStream:
          begin
            // monta um arquivo temporario
            if TDataItem(FSendData.Items[i]).Value = '' then
              ZipTemp := TPath.Combine(PathTemp,TDataItem(FSendData.Items[i]).Name)
            else
              ZipTemp := TPath.Combine(PathTemp,TDataItem(FSendData.Items[i]).Value);

            // sava arquivo localmente para ser compactado
            TDataItem(FSendData.Items[i]).Stream.SaveToFile(ZipTemp);

            // adiciona ao zip
            ZipFile.Add(ZipTemp);

            // remove arquivo temporario
            DeleteFile(ZipTemp)
          end;
      end;
    end;

    // prepara nosso arquivo de parametros
    SS.SaveToFile(getFileNameTempParam);
    ZipFile.Add(getFileNameTempParam);
    DeleteFile(getFileNameTempParam);

    // fecha nosso arquivo
    ZipFile.Close;
  finally
    // libera memoria para todos
    SS.Free;
    ZipFile.Free;
  end;
end;

procedure TSendGetZip.Query(cdsTable:TClientDataSet;sQuery:string='';sTableName:string='';sFieldKeyName:string='');
begin

  // Incrementa contagem
  FCountQuery :=   FCountQuery+1;

  // incrementa a lista
  AddReturnCDS(sTableName,sFieldKeyName,cdsTable);

  // adicionar os paramtetros para servidor processar esta função
  setField('Query_'+IntToStr(FCountQuery)+'_SQL',sQuery,dtString);
  setField('Query_'+IntToStr(FCountQuery)+'_RESULTNAME',cdsTable.Name,dtString);

end;

procedure TSendGetZip.RecoverPassword(sUser: string;sMsg:string;sTarget:TUserType);
var
  strRecoverTarget:string;
begin
  // dispara o prepare
  Prepare;

  if sTarget = sMail then begin
    strRecoverTarget:='Mail';
  end else if sTarget = sPhone then begin
    strRecoverTarget:='Phone';
  end else if sTarget = sDoc then begin
    strRecoverTarget:='Doc';
  end;

  // caso não exista inicia o insertdb
  setField('_userRecover',strRecoverTarget,dtString);
  setField('_userRecover'+strRecoverTarget,sUser,dtString);
  setField('_userRecoverMessage',sMsg,dtString);

  // retorna dados do usuario
  SendGet('');

end;

procedure TSendGetZip.RecoverPassword(sUser: string;sTarget:TUserType);
begin

  RecoverPassword(sUser,'',sTarget);

end;

procedure TSendGetZip.RenameTable(tableName, new_tableName: string);
var
  i:integer;
begin

  setField('RenameTable',1,dtInteger);
  setField('RenameTable_A_'+tableName,new_tableName,dtString);

end;

procedure TSendGetZip.SendGet(Section: String);
begin
  SendGetPage(ParamPage,Section);
end;

procedure TSendGetZip.SendGet(Section: String; ProcComplete: TOnComplete;
  ProcFailed:TOnFailed);
begin
  SendGetPage(ParamPage,Section,ProcComplete,ProcFailed);
end;

procedure TSendGetZip.SendGetPage(Page, Section: String);
begin
  SendGetPage(Page,Section,FOnComplete,FOnFailed);
end;

procedure TSendGetZip.SendGetPage(Page,Section: String;
  ProcComplete: TOnComplete; ProcFailed:TOnFailed);
var
  FileStream:TMemoryStream;
  m:string;

begin

  // verifica se o diretorio de extração existe
  if PathTemp = '' then FTimeStamp := FormatDateTime('yyyy-mm-dd_hh-nn-ss_zzz',now);

  // caso não exista o diretorio cria ele
  if not DirectoryExists(PathTemp) then CreateDir(PathTemp);

  try

    // preparar o arquivo zip
    PrepareSendPackage;

    // carregamos o arquivo zip para uma stream
    FileStream := TMemoryStream.Create;
    FileStream.LoadFromFile(getFileNameTempSend);

    // local de envio
    if FURL <> '' then begin
      FRestClient.BaseURL := FURL;
    end else begin
      raise Exception.Create('URL esta vazia!');
    end;

    // configuramos o metodo de envio
    FRequest.Method := TRESTRequestMethod.rmPOST;
    FRestClient.UserAgent := 'Mozilla/5.0 (Windows NT 10.0; …) Gecko/20100101 Firefox/56.0';
    FRestClient.Accept := 'text/html,application/xhtml+xm…plication/xml;q=0.9,*/*;q=0.8';
    FRestClient.AcceptEncoding := 'gzip, deflate';

    // adiciona nosso arquivo para o servidor receber
    FRequest.AddFile('pacote',getFileNameTempSend,TRESTContentType.ctAPPLICATION_OCTET_STREAM);

    // envia seção que o pacote será direcionado
    if (Section<>'') then
      FRequest.AddParameter('section',Section);

    if (page<>'') then
      FRequest.AddParameter('page',page);

    // envia o arquivo para o servidor
    FRequest.ExecuteAsync(procedure
                            var
                              Param:TStrings;
                              Files:TStrings;
                              ErroFile:TStrings;
                              ListFile:TStringDynArray;
                              //ZipFile: TEncryptedZipFile;
                              ZipFile: TZipFile;
                              Erro:TObject;
                              I,b: Integer;
                              RespostaContent:string;
                              ApplyCDS:boolean;

                              function getParamSystem(Name:string;Param:TStrings):string;
                              begin
                                if Param.Values[Name] <> '' then begin
                                  result := Param.Values[Name];
                                end;
                              end;

                              function getParamSystemIt(Name:string;Param:TStrings):integer;
                              begin
                                if Param.Values[Name] <> '' then begin
                                  result := StrToInt(Param.Values[Name]);
                                end else begin
                                  result := 0;
                                end;
                              end;

                              function getParamSystemDt(Name:string;Param:TStrings):TDatetime;
                              var
                                data:string;
                                hora:string;
                                explode:TStrings;
                              begin
                                if Param.Values[Name] <> '' then begin
                                  try
                                    explode := TStringList.Create;
                                    explode.Delimiter:=' ';
                                    explode.DelimitedText := Param.Values[Name];
                                    hora := explode.Strings[1];
                                    data := explode.Strings[0];
                                    explode.Delimiter := '-';
                                    explode.DelimitedText := data;
                                    data := explode.Strings[2]+'/'+explode.Strings[1]+'/'+explode.Strings[0];

                                    result := StrToDateTime(data+' '+hora);
                                  finally
                                    result := 0;
                                    explode.Free;
                                  end;
                                end;
                              end;

                              function getParamSystemBl(Name:string;Param:TStrings):boolean;
                              begin
                                if Param.Values[Name] <> '' then begin
                                  result := (UpperCase(Param.Values[Name])='S');
                                end;
                              end;

                            begin
                              try

                                if FileExists(getFileNameTempSend) then deletefile(getFileNameTempSend);

                                if DirectoryExists(PathTemp) then RemoveDir(PathTemp);
                                
                                // pega o tempo atual pra criar uma pasta temporaria
                                FTimeStamp  := FormatDateTime('yyyy-mm-dd_hh-nn-ss_zzz',now);

                                // verifica se o diretorio de extração existe
                                if not DirectoryExists(PathTemp) then CreateDir(PathTemp);

                                // pega resposta e preenche numa variavel
                                RespostaContent := FResponse.Content;

                                if FResponse.StatusCode <> 200 then begin
                                    FCodeErro := -2;
                                    FMsgErro := RespostaContent+#13+'StatusCode: '+IntToStr(FResponse.StatusCode);
                                    if Assigned(FOnFailed) then FOnFailed(Self,-2,RespostaContent);
                                  exit;
                                end;

                                if FileExists(getFileNameTempGet) then deletefile(getFileNameTempGet);

                                // cria objetos para trabalhar
                                Param := TStringList.Create;
                                Files := TStringList.Create;

                                TFile.WriteAllBytes(getFileNameTempGet,FResponse.RawBytes);

                                try
                                  // instancia nosso objeto com a senha padrão
                                  //ZipFile := TEncryptedZipFile.Create(FPassword);
                                  ZipFile := TZipFile.Create();

                                  // abre o arquivo gerado
                                  ZipFile.Open(getFileNameTempGet,zmRead);

                                  try
                                    // verifica se o diretorio de extração existe
                                    if not DirectoryExists(getDirNameTempGet) then CreateDir(getDirNameTempGet);

                                    // manda extrair todos os arquivos
                                    ZipFile.ExtractAll(getDirNameTempGet);

                                    // fecha objeto
                                    ZipFile.Close;
                                  finally
                                    // libera memoria
                                    ZipFile.Free;
                                  end;

                                except
                                    // libera memoria
                                    ZipFile.Free;

                                    // carrega o erro
                                    ErroFile := TStringList.Create;
                                    ErroFile.LoadFromFile(getFileNameTempGet);

                                    // retorna erro local
                                    FCodeErro := 11;
                                    FMsgErro := 'LOCAL:'+#13;
                                    RespostaContent := 'WEB:'+#13+RespostaContent+#13#13+FMsgErro+#13+ErroFile.Text;

                                    // liebera memoria
                                    ErroFile.Free;

                                end;

                                // lista todos os arquivos da pasta
                                  if DirectoryExists(getDirNameTempGet) then begin

                                    try
                                      ListFile := System.IOUtils.TDirectory.GetFiles(getDirNameTempGet);
                                    except
                                      FCodeErro := 11;
                                      FMsgErro := #13+'Diretorio existe, mas não contem arquivos validos!';
                                      RespostaContent := RespostaContent+#13+FMsgErro;
                                    end;

                                  end else begin

                                      FCodeErro := 10;
                                      FMsgErro := #13+'Diretorio do arquivo zip não existe!';
                                      RespostaContent := RespostaContent+#13+FMsgErro;
                                  end;

                                // localiza os arquivos do diretorio
                                for I := 0 to length(ListFile)-1 do begin
                                  // inclui na listagem todos os arquivos menos o "param.txt"
                                  if ListFile[i] <> 'param.txt' then Files.Add(  ListFile[i] );
                                end;

                                // executa evento que exibe todos os arquivos
                                if Assigned(FOnFiles) then FOnFiles(Self,Files,Param);

                                // caso tenha encontrado o arquivo de parametro carrega separado
                                if FileExists(TPath.Combine(getDirNameTempGet,'param.txt')) then begin
                                  Param.LoadFromFile(TPath.Combine(getDirNameTempGet,'param.txt'));
                                  Param.Text := StringReplace(TNetEncoding.Base64.Decode(Param.Text),'\n\r',#13,[rfReplaceAll]);
                                end;


                                // ############################################################
                                // ##################### RETURN CDS ###########################
                                // ############################################################
                                for I := 0 to length(ListFile)-1 do begin

                                // executa evento que exibe todos os arquivos
                                if Assigned(FOnFileReceive) then FOnFileReceive(Self,ListFile[i],Param);

                                  // verifica se tem algum retorno de dados para ClientDataSet
                                  if FListReturnCDS.Count > 0 then begin

                                    // roda a lista de objetos armazenados
                                    for b := 0 to FListReturnCDS.Count-1 do begin

                                      //verifica se existe na lista de arquivos
                                      if ExtractFileName(ListFile[i])='ReturnDB_'+FListReturnCDS.Items[b].TableName+'.xml' then begin

                                        // executa automáticamente o apply
                                        ApplyCDS := true;

                                        // executa o evento antes de abrir o CDS
                                        if Assigned(FOnReturnCDSBefore) then begin

                                          // caso não tenha o campo chave tenta pegar o que veio do servidor
                                          if FListReturnCDS.Items[b].FieldKeyName = '' then
                                            FListReturnCDS.Items[b].FieldKeyName := Param.Values['ReturnDB_KEY_'+FListReturnCDS.Items[b].TableName];

                                          FOnReturnCDSBefore(Self,FListReturnCDS.Items[b].TableName,FListReturnCDS.Items[b].FieldKeyName,ListFile[i],FListReturnCDS.Items[b].CDS,ApplyCDS,Param);
                                        end;

                                        // carrega o XML para o ClientDataSet repassado
                                        if ApplyCDS then
                                          FListReturnCDS.Items[b].CDS.LoadFromFile(  ListFile[i] );

                                        // executa o evento antes de depois de abrir
                                        if Assigned(FOnReturnCDSAfter) then begin

                                          // caso não tenha o campo chave tenta pegar o que veio do servidor
                                          if FListReturnCDS.Items[b].FieldKeyName = '' then
                                            FListReturnCDS.Items[b].FieldKeyName := Param.Values['ReturnDB_KEY_'+FListReturnCDS.Items[b].TableName];

                                          if Assigned(FListReturnCDS.Items[b].OnExecute) then
                                            FListReturnCDS.Items[b].OnExecute(FListReturnCDS.Items[b].TableName,FListReturnCDS.Items[b].CDS);


                                          FOnReturnCDSAfter(Self,FListReturnCDS.Items[b].TableName,FListReturnCDS.Items[b].FieldKeyName,ListFile[i],FListReturnCDS.Items[b].CDS,Param);
                                        end;


                                      end;

                                    end;

                                  end;

                                end;

                                // repassa o diretorio que salvo os arquivos
                                Param.Values['path'] := getDirNameTempGet;

                                // carrega o token
                                Token := getParamSystem('_userToken',param);

                                // pega os parametros de sistema e retorna para os dados
                                if Assigned(FOnAutentication) then begin
                                  FOnAutentication(self,Token,(Token<>''),Param);
                                end;

                                // carrega dados do usuário
                                UserLogin.Id                  := getParamSystemIt('_userId',param);
                                UserLogin.IdOther             := getParamSystemIt('_userIdOther',param);
                                UserLogin.Name                := getParamSystem('_userName',param);
                                UserLogin.Mail                := getParamSystem('_userMail',param);
                                UserLogin.Password            := getParamSystem('_userPassword',param);
                                UserLogin.Phone               := getParamSystem('_userPhone',param);
                                UserLogin.TemporaryNumber     := getParamSystem('_userTemporaryNumber',param);
                                UserLogin.VerifiedMail        := getParamSystemBl('_userVerifiedMail',param);
                                UserLogin.VerifiedPhone       := getParamSystemBl('_VerifiedPhone',param);
                                UserLogin.Administrador       := getParamSystemBl('_userAdministrador',param);
                                UserLogin.Active              := getParamSystemBl('_userActive',param);
                                UserLogin.Suspended           := getParamSystemBl('_userSuspended',param);
                                UserLogin.LastVisit           := getParamSystemDt('_userLastVisit',param);
                                UserLogin.Registered          := getParamSystemDt('_userRegistered',param);
                                UserLogin.LastIP              := getParamSystem('_userLastIP',param);
                                UserLogin.Token               := getParamSystem('_userToken',param);
                                UserLogin.TokenValidate       := getParamSystemDt('_userTokenValidate',param);

                                {####################################################################################
                                ############################ MODIFY USER ############################################
                                ####################################################################################}

                                if getParamSystem('_userModifyField',param) <> '' then begin

                                  UserLogin.Modify.IsUpdate           := true;
                                  UserLogin.Modify.Field              := getParamSystem('_userModifyField',param);
                                  UserLogin.Modify.FieldValue         := getParamSystem('_userModifyFieldValue',param);
                                  UserLogin.Modify.CodeValidate       := getParamSystemDt('_userModifyCodeValidate',param);
                                  UserLogin.Modify.Code               := getParamSystem('_userModifyCode',param);
                                  UserLogin.Modify.SendMsgCount       := getParamSystemIt('_userModifySendMsgCount',param);
                                  UserLogin.Modify.SendMsgValidade    := getParamSystemDt('_userModifySendMsgValidade',param);

                                  // modificação de usuário
                                  if Assigned(FOnModifyUser) then FOnModifyUser(Self,UserLogin,false);

                                end else begin

                                  // atualiza o status da modificação
                                  UserLogin.ModifyStatus := (getParamSystem('_userModifyAuthCodeStatus',param) = 'OK');

                                  // valida modificação de usuario
                                  if Assigned(FOnModifyUser) and (UserLogin.ModifyStatus) then FOnModifyUser(Self,UserLogin,true);

                                end;

                                {####################################################################################
                                ############################ RECOVER USER ###########################################
                                ####################################################################################}

                                if getParamSystem('_userTarget',param) <> '' then begin
                                  UserLogin.Recovery.IsUpdate := true;

                                  if getParamSystem('_userTarget',param)='Mail' then begin
                                    UserLogin.Recovery.Target := sMail;
                                    m:='Mail';
                                  end else if getParamSystem('_userTarget',param)='Phone' then begin
                                    UserLogin.Recovery.Target := sPhone;
                                    m:='Phone';
                                  end else if getParamSystem('_userTarget',param)='Doc' then begin
                                    UserLogin.Recovery.Target := sDoc;
                                    m:='Doc';
                                  end;

                                  UserLogin.Recovery.IP               := getParamSystem('_userRecover'+m+'IP',param);
                                  UserLogin.Recovery.Code             := getParamSystem('_userRecover'+m+'Code',param);
                                  UserLogin.Recovery.CodeValidate     := getParamSystemDt('_userRecover'+m+'CodeValidate',param);
                                  UserLogin.Recovery.SendMsgValidade  := getParamSystemDt('_userRecover'+m+'SendMsgValidade',param);
                                  UserLogin.Recovery.SendMsgCount     := getParamSystemIt('_userRecover'+m+'SendMsgCount',param);

                                  if Assigned(FOnRecoverUser) then FOnRecoverUser(Self,UserLogin,false);

                                end else begin

                                  // atualiza o status da modificação
                                  UserLogin.RecoverStatus := (getParamSystem('_userRecoverAuthCodeStatus',param) = 'OK');

                                  // valida modificação de usuario
                                  if Assigned(FOnRecoverUser) and (UserLogin.RecoverStatus) then FOnRecoverUser(Self,UserLogin,true);

                                end;

                                {####################################################################################
                                ############################ LOGIN AUTH #############################################
                                ####################################################################################}

                                if getParamSystem('_userLoginAuthCode',param) <> '' then begin

                                  // armazena o codigo de autenticação do login
                                  UserLogin.AuthCode := getParamSystem('_userLoginAuthCode',param);

                                  // valida modificação de usuario
                                  if Assigned(FOnLoginUser) then FOnLoginUser(Self,UserLogin,false);

                                end else begin

                                  UserLogin.LoginStatus := (getParamSystem('_userLoginAuthCodeStatus',param) = 'OK');

                                  // valida modificação de usuario
                                  if Assigned(FOnLoginUser) and (UserLogin.LoginStatus) then FOnLoginUser(Self,UserLogin,true);

                                end;



                                if Param.Values['erro_code'] <> '' then begin
                                  FCodeErro := StrToIntDef(Param.Values['erro_code'],-1);
                                  FMsgErro := Param.Values['erro_msg'];
                                  if Assigned(ProcFailed) then ProcFailed(Self,FCodeErro,FmsgErro);
                                end else begin
                                  if Trim(RespostaContent) <> '' then begin
                                    FCodeErro := -1;
                                    FMsgErro := RespostaContent;
                                    if Assigned(ProcFailed) then ProcFailed(Self,FCodeErro,FmsgErro);
                                  end else begin
                                    // dispara o evento do cliente
                                    if Assigned(ProcComplete) then ProcComplete(Self,Param,Files);
                                  end;
                                end;

                                // limpeza completa dos arquivos
                                for I := 0 to length(ListFile)-1 do begin
                                  DeleteFile(ListFile[i])
                                end;


                                // remove pacote recebido
                                if FileExists(getFileNameTempGet) then deletefile(getFileNameTempGet);

                                // remove pacote enviado
                                if FileExists(getFileNameTempSend) then deletefile(getFileNameTempSend);

                                // remove pasta temporaria
                                RemoveDir(getDirNameTempGet);

                                // remove pasta temporaria
                                RemoveDir(PathTemp);

                              finally
                                // liebra memoria
                                Param.Free;
                                Files.Free;
                              end;
                            end
    ,true,true,procedure(eo:TObject)
                begin
                  if (eo=nil) then
                    if Assigned(ProcFailed) then ProcFailed(Self,-4,'Erro interno')
                  else
                    if Assigned(ProcFailed) then ProcFailed(Self,-4,Exception(eo).Message);
                end);


  finally
    // libera memoria
    FileStream.Free;
  end;

  // vou zerar o procedimento de contagem de query
  FCountQuery := 0;
end;

procedure TSendGetZip.SendGetURL(setURL,Section: String);
begin

  FURL := setURL;
  SendGet(Section);

end;

procedure TSendGetZip.SendGetURL(setURL, Section: String;
  ProcComplete: TOnComplete; ProcFailed: TOnFailed);
begin

  FURL := setURL;
  SendGet(Section,ProcComplete,ProcFailed);

end;

procedure TSendGetZip.SendGetURLPage(setURL, Page, Section: String;
  ProcComplete: TOnComplete; ProcFailed: TOnFailed);
begin

  FURL := setURL;
  SendGetPage(Page,Section,ProcComplete,ProcFailed);

end;

procedure TSendGetZip.setField(sName: string; sValue: Variant;
  sType: TDataItemType);
begin
  with TDataItem(Self.SendData.Add) do begin
    Name  := sName;
    Value := sValue;
    DataType := sType;
  end;
end;

procedure TSendGetZip.setUser(Login: TSetUserLogin);

  function chkBol(bl:boolean):string;
  begin
    if bl then
      result := 'S'
    else
      result := 'N';
  end;
begin

  // dispara o prepare
  Prepare;

  // seta os campos necessários
  setField('_userSet'             ,Login.Id               ,dtInteger);
  if Login.IdOther>0 then   setField('_userIdOther'         ,Login.IdOther          ,dtInteger);
  if Login.Name<>'' then      setField('_userName'            ,Login.Name             ,dtString);
  if Login.Mail<>'' then      setField('_userMail'            ,Login.Mail             ,dtString);
  if Login.Password<>'' then  setField('_userPassword'        ,Login.Password         ,dtString);
  if Login.Phone<>'' then     setField('_userPhone'           ,Login.Phone            ,dtString);
  setField('_userAdministrador'   ,chkBol(Login.Administrador)    ,dtString);
  setField('_userActive'          ,chkBol(Login.Active)           ,dtString);
  setField('_userSuspended'       ,chkBol(Login.Suspended)        ,dtString);

  // retorna dados do usuario
  SendGet('');
end;


procedure TSendGetZip.SendGetURLPage(setURL, Page, Section: String);
begin

  FURL := setURL;
  SendGetPage(Page,Section);

end;

{ TListDataItem }

function TListDataItem.Find(Name: string): TDataItem;
begin

end;


end.
