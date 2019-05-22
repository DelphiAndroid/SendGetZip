unit ComboBoxDA;

interface

uses
  System.SysUtils, System.Classes, FMX.Types, FMX.Controls, FMX.ListBox;

type
  TComboBoxDA = class(TComboBox)
  private
    { Private declarations }
     FItemsValue: TStrings;
  protected
    { Protected declarations }
  public
    { Public declarations }
    procedure SetItems(const Value: TStrings);
    function ItemsStored: Boolean;
  published
    { Published declarations }
    property ItemsValue: TStrings read FItemsValue write SetItems stored ItemsStored;

  end;

procedure Register;

implementation

procedure TComboBoxDA.SetItems(const Value: TStrings);
begin
  ItemsValue.Assign(Value);
end;

function TComboBoxDA.ItemsStored: Boolean;
var
  I: Integer;
begin
  for I := 0 to Count - 1 do
    if ListItems[I].Stored then
      Exit(False);
  Result := True;
end;



procedure Register;
begin
  RegisterComponents('DelphiAndroid', [TComboBoxDA]);
end;

end.
