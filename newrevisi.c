#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>
#include <ctype.h>
#include <stdbool.h>
#include <time.h>
struct Member {
    char nama[50];
    int umur;
    char noHp[15];
};
struct NonMember {
    char nama[50];
    int umur;
    char noHp[15];
};
struct Member member;
struct NonMember nonmember;

struct dataUser{
    char name[50];
    int ages;
    char nohp[15];
};
struct purchased item;
struct dataUser user;
int main();
void daftarMember();
void registrasi();
bool cekMember(const char *nama, const char *noHp);
int isValidNohp(const char *str);
void inputNohp(struct Member *temp);
void inputName(struct Member *temp);
void inputNohpN(struct NonMember *temp);
void inputNameN(struct NonMember *temp);
int isValidName(const char *str);
int validasi2();
int validasi3();
int validasiAges();
int validasi7();
int validasi10();
void pause();
void HIDUPTI();
void repeat();
void intro();
int memberOrNot();
void memberPricing();
void nonMemberPricing();
void priceMorningMember();
void priceAfternoonMember();
void priceNightMember();
void priceMorningNonMember();
void priceAfternoonNonMember();
void priceNightNonMember();
int pickRoom(int kode);
int pickHour(int code);
void creatingBill();
void totalOfCost(char room[], float price, int codeHour, float priceOfFood);
void listOfSnackAndDrink();
float buySnackAndDrink();
float snacknDrink();
void pickSession(int codeSession, int codeRoom, int codeHour, int codeMember);
void inputNameA(char *name);
void inputNohpA(char *nohp);
// Fungsi untuk mendaftarkan member baru
void lineBot()
{
    printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC8\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
}
void lineConnector()
{
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
}
void lineTop2()
{
    printf("\n\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
}
void lineConnector2()
{
    printf("\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
}
void lineBot2()
{
    printf("\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
}
void pause()
{
    printf("\n                                                                                           Press Enter");
    while (_getch() != 13)
        ;
    system("cls");
}
void lineTop()
{
    printf("\n\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC9\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
}
void daftarMember() {
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Input Name: ");
    inputName(&member);
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Input Age: ");
    member.umur = validasiAges();
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Input Phone Number: ");
    inputNohp(&member);
    lineBot();

    // Simpan data member ke database (misalnya, file teks)
    FILE *file = fopen("database.txt", "a");
    fprintf(file, "%s %d %s\n", member.nama, member.umur, member.noHp);
    fclose(file);

    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Pendaftaran berhasil! \e[32m\xBA<<<<<\xBA\e[0m\n");

    strcpy(user.name, member.nama);
    user.ages = member.umur;
    strcpy(user.nohp, member.noHp);
}
void registrasi(){
    lineTop();
    printf("Masukkan nama: ");
    inputNameN(&nonmember);
    lineConnector();
    printf("Masukkan umur: ");
    nonmember.umur = validasiAges();
    lineConnector();
    printf("Masukkan nomor HP: ");
    inputNohpN(&nonmember);
    lineBot();
    lineTop();
    printf("Registrasi berhasil!\n");
    lineBot();
    strcpy(user.name, nonmember.nama);
    user.ages = nonmember.umur;
    strcpy(user.nohp, nonmember.noHp);
}
// Fungsi untuk mengecek apakah seorang pengguna adalah member atau bukan
bool cekMember(const char *nama, const char *noHp) {
    // Baca data dari database (misalnya, file teks)
    FILE *file = fopen("database.txt", "r");
    char dbNama[50];
    int dbUmur;
    char dbNoHp[15];

    while (fscanf(file, "%s %d %s", dbNama, &dbUmur, dbNoHp) != EOF) {
        if (strcmp(nama, dbNama) == 0 || strcmp(noHp, dbNoHp) == 0) {
            fclose(file);
            strcpy(user.name, dbNama);
            user.ages = dbUmur;
            strcpy(user.nohp, dbNoHp);
            return true; // Member ditemukan
        }
    }

    fclose(file);
    return false; // Member tidak ditemukan
}

int isValidNohp(const char *str)
{
    int len = strlen(str);

    if (len <= 10)
    {
        return 0;
    }

    // Periksa setiap karakter apakah merupakan digit (0-9)
    for (int i = 0; i < len; i++)
    {
        if (!isdigit(str[i]))
        {
            return 0;
        }
    }

    return 1;
}
void inputNohp(struct Member *temp)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%1023[^\n]", buff);

        if (isValidNohp(buff))
        {
            strcpy(temp->noHp, buff);
            break;
        }

        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NO HP yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}
void inputNohpA(char *nohp)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%1023[^\n]", buff);

        if (isValidNohp(buff))
        {
            strcpy(nohp, buff);
            break;
        }

        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NO HP yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}
void inputNohpN(struct NonMember *temp)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%1023[^\n]", buff);

        if (isValidNohp(buff))
        {
            strcpy(temp->noHp, buff);
            break;
        }

        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NO HP yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}
int isValidName(const char *str)
{
    int len = strlen(str);
    char newWord[len + 1]; // Tambahkan 1 untuk null terminator

    for (int i = 0; i < len; i++)
    {
        newWord[i] = toupper(str[i]);
    }

    newWord[len] = '\0'; // Pastikan menambahkan null terminator di akhir

    for (int i = 0; i < len; i++)
    {
        if (!isalpha(newWord[i]) && newWord[i] != ' ')
        {
            // printf("salah : %c\n", newWord[i]);
            return 0; // Bukan huruf atau spasi
        }
    }

    return 1; // Huruf atau spasi
}
void inputNameA(char *name)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%[^\n]", buff);
        
        if (isValidName(buff))
        {
            strcpy(name, buff);
            break;
        }
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NAMA yang valid!\e[0m         \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}
void inputName(struct Member *temp)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%[^\n]", buff);
        
        if (isValidName(buff))
        {
            strcpy(temp->nama, buff);
            break;
        }
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NAMA yang valid!\e[0m         \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}
void inputNameN(struct NonMember *temp)
{
    char buff[1024];

    while (1)
    {
        fflush(stdin);
        scanf("%[^\n]", buff);
        
        if (isValidName(buff))
        {
            strcpy(temp->nama, buff);
            break;
        }
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan NAMA yang valid!\e[0m         \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
    }
}

int validasiAges(){
    int value;
    char temp;
    if (scanf("%d%c", &value, &temp) != 2 || temp != '\n' || value < 0)
    {
        fflush(stdin);
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan AGES yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
        return validasiAges();
    }
    else
    {
        return value;
    }
}
int validasi3()
{
    int value;
    char temp;
    if (scanf("%d%c", &value, &temp) != 2 || temp != '\n' || value < 1 || value > 3)
    {
        fflush(stdin);
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan input yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
        return validasi3();
    }
    else
    {
        return value;
    }
}
int validasi2()
{
    int value;
    char temp;
    if (scanf("%d%c", &value, &temp) != 2 || temp != '\n' || value < 1 || value > 2)
    {
        fflush(stdin);
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan input yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
        return validasi2();
    }
    else
    {
        return value;
    }
}
int validasi7()
{
    int value;
    char temp;
    if (scanf("%d%c", &value, &temp) != 2 || temp != '\n' || value < 1 || value > 7)
    {
        fflush(stdin);
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan input yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
        return validasi7();
    }
    else
    {
        return value;
    }
}
int validasi10()
{
    int value;
    char temp;
    if (scanf("%d%c", &value, &temp) != 2 || temp != '\n' || value < 1 || value > 10)
    {
        fflush(stdin);
        printf("\t\t\e[32m\xBA>>>>>\xBA\e[0m  \e[31mInput salah! Silakan masukkan input yang valid!\e[0m          \e[32m\xBA<<<<<\xBA\e[0m\n\t\t");
        return validasi10();
    }
    else
    {
        return value;
    }
}



float pricePCMember[3][3][6] = {
    // exe                                         vip                                        reg
    {{12000, 22000, 33000, 42000, 52000, 62000}, {7000, 14000, 20000, 24000, 30000, 36000}, {2000, 5000, 8000, 12000, 16000, 19000}},  // morning
    {{18000, 26000, 37000, 51000, 59000, 67000}, {11000, 22000, 30000, 38000, 47000, 56000}, {4000, 8000, 16000, 22000, 28000, 35000}}, // afternoon
    {{9000, 17000, 26000, 33000, 41000, 47000}, {5000, 11000, 17000, 25000, 33000, 37000}, {1000, 5000, 8000, 10000, 13000, 15000}}    // night
};
float pricePCNonMember[3][3][6] = {
    // exe                                         vip                                        reg
    {{15000, 25000, 36000, 45000, 55000, 65000}, {10000, 17000, 23000, 27000, 33000, 39000}, {5000, 8000, 11000, 15000, 19000, 22000}},  // moring
    {{21000, 29000, 40000, 54000, 62000, 70000}, {14000, 25000, 33000, 41000, 50000, 59000}, {7000, 11000, 19000, 25000, 31000, 38000}}, // afternoon
    {{12000, 20000, 29000, 36000, 44000, 50000}, {8000, 14000, 20000, 28000, 36000, 40000}, {4000, 8000, 11000, 13000, 16000, 18000}}    // night
};

float price = 0;
float priceFoodnDrink[10] = {
    3000,  // tea (ice/hot)
    4000,  // coffe  (ice/hot)
    5000,  // milk (ice/hot)
    10000, // fried noodle
    10000, // noodle soup
    12000, // toast
    3000,  // lays
    3000,  // chitato
    6000,  // Milky Joss
    1000,  // candy
};
struct priceFoodnDrink
{
    char name[20][20];  // Change from char name[20] to char name[20][20]
    float pricing[10];
};
struct priceFoodnDrink list;
struct purchased{
    char name[100][20];
    float price[100];
    int n[10];
};
// gusadit
void HIDUPTI(){
    system("cls");
    printf("\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
	printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
	printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
	printf("\t\t\t\t\e[32m\xBA\e[0m        TERIMA KASIH SUDAH MENGGUNAKAN PROGRAM KAMI        \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
	printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m             \x1b[38;2;100;50;0m\\|||||||||||||||\x1b[0m   \x1b[38;2;255;215;0m|||||||||||\\\x1b[0m               \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \x1b[38;2;100;50;0m\\||||||||||||||\x1b[0m   \x1b[38;2;255;215;0m||||||||||||\\\x1b[0m              \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m               \x1b[38;2;100;50;0m\\|||||||||||||\x1b[0m   \x1b[38;2;255;215;0m|||||||||||||\\\x1b[0m             \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m                              \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||||||||/\x1b[0m             \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m||||||||||||/\x1b[0m              \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||||||/\x1b[0m               \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||\x1b[0m                    \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||\x1b[0m                    \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||\x1b[0m                    \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                      \x1b[38;2;100;50;0m|||||||\x1b[0m   \x1b[38;2;100;50;0m|||||||\x1b[0m                    \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                       \x1b[38;2;100;50;0m\\|||||\x1b[0m   \x1b[38;2;100;50;0m|||||/\x1b[0m                     \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                        \x1b[38;2;100;50;0m\\||||\x1b[0m   \x1b[38;2;100;50;0m||||/\x1b[0m                      \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                          \x1b[38;2;100;50;0m\\||\x1b[0m   \x1b[38;2;100;50;0m||/\x1b[0m                        \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                                                           \e[32m\xBA\e[0m\n");
	printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
}
// tri
void repeat()
{
    system("cls");
    int menu;
    printf("\n\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC9\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                           MENU                          \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m ULANG                                                   \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m      KELUAR                                             \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC8\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
    printf("\n\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xBB\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC9\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    menu = validasi2();
    printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xBC\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xC8\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
    if (menu == 1)
    {   
        system("cls");
        main();
    }
    else if (menu == 2)
    {
        system("cls");
        HIDUPTI();
    }
}
// arya
void intro()
{
    printf("\n\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                                                                     \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xBA\e[0m                                         \e[32m\xBA\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xBA\e[0m             W E L C O M E !             \e[32m\xBA\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xBA\e[0m                                         \e[32m\xBA\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xBA\e[0m       P R O G R A M   W A R N E T       \e[32m\xBA\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xBA\e[0m                                         \e[32m\xBA\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m              \e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\e[0m            \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                                                                     \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
    printf("\t\t\t\t\e[32m\xC9\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBB\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m CREATED BY :                                                        \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m                NAMA               \e[32m\xBA\e[0m                NIM              \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m Nyoman Tri Darma Wahyudi          \e[32m\xBA\e[0m             2305551052          \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m Putu Arya Ekananda Kusuma Negara  \e[32m\xBA\e[0m             2305551057          \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA\e[0m Ida Bagus Gde Raditya Wedananta   \e[32m\xBA\e[0m             2305551102          \e[32m\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xC8\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xCD\xBC\e[0m\n");
    pause();
}
// tri
int memberOrNot(){
    int codeMember;
    char nama[50];
    char noHp[15];
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                   ARE YOU A MEMBER HERE ?               \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA  1. \xBA\e[0m YES                                                     \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA  2. \xBA\e[0m NO                                                      \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    int kode, kode2;

    scanf("%d", &kode);
    lineBot();
    pause();
    if(kode == 1){
        lineTop();
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Input Name : ");
        inputNameA(nama);
        lineConnector();
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Input Phone Number : ");
        inputNohpA(noHp);
        lineBot();
        if(cekMember(nama, noHp)){
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Halo, %s! Harga khusus untuk member. \e[32m\xBA<<<<<\xBA\e[0m\n", nama);
            lineBot();
            pause();
            memberPricing();
            return 1;
        }else{
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m             We Are Sorry You Are NOT A Member .         \e[32m\xBA<<<<<\xBA\e[0m\n");
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Do You Want To Be A Member?                             \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineConnector();
            printf("\t\t\t\t\e[32m\xBA  1. \xBA\e[0m YES                                                     \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineConnector();
            printf("\t\t\t\t\e[32m\xBA  2. \xBA\e[0m NO                                                      \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineBot();
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
            scanf("%d", &kode2);
            lineBot();
            switch(kode2){
                case 1:
                    daftarMember(&member);
                    memberPricing();
                    return 1;
                    break;
                case 2:
                    registrasi();
                    pause();
                    nonMemberPricing();
                    return 0;
                    break;
            }
        }
    }else if(kode == 2){
           lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                Do You Want To Be A Member?              \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineConnector();
            printf("\t\t\t\t\e[32m\xBA  1. \xBA\e[0m YES                                                     \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineConnector();
            printf("\t\t\t\t\e[32m\xBA  2. \xBA\e[0m NO                                                   \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineBot();
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
            scanf("%d", &kode2);
            lineBot();
            switch(kode2){
                case 1:
                    daftarMember(&member);
                    memberPricing();
                    return 1;
                    break;
                case 2:
                    registrasi();
                    pause();
                    nonMemberPricing();
                    return 0;
                    break;
            }
    }
}
void memberPricing(){
    time_t t;
    t = time(NULL);
    struct tm tm = *localtime(&t);
    int hour = tm.tm_hour;
    if(hour >= 6 && hour <= 12){
        priceMorningMember();
    }else if(hour > 12 && hour <= 17){
        priceAfternoonMember();
    }else if(hour > 17 && hour <= 23 || hour >= 0 && hour < 6){
        priceNightMember();
    }
}
void nonMemberPricing(){
    time_t t;
    t = time(NULL);
    struct tm tm = *localtime(&t);
    int hour = tm.tm_hour;
    if(hour >= 6 && hour <= 12){
        priceMorningNonMember();
    }else if(hour > 12 && hour <= 17){
        priceAfternoonNonMember();
    }else if(hour > 17 && hour <= 23 || hour >= 0 && hour < 6){
        priceNightNonMember();
    }
}
// arya
void priceMorningMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                Morning Session For Member              \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[0][0][0], pricePCMember[0][0][1], pricePCMember[0][0][2], pricePCMember[0][0][3], pricePCMember[0][0][4], pricePCMember[0][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[0][1][0], pricePCMember[0][1][1], pricePCMember[0][1][2], pricePCMember[0][1][3], pricePCMember[0][1][4], pricePCMember[0][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[0][2][0], pricePCMember[0][2][1], pricePCMember[0][2][2], pricePCMember[0][2][3], pricePCMember[0][2][4], pricePCMember[0][2][5]);
    lineBot2();
}
// arya
void priceAfternoonMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                Afternoon Session For Member         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[1][0][0], pricePCMember[1][0][1], pricePCMember[1][0][2], pricePCMember[1][0][3], pricePCMember[1][0][4], pricePCMember[1][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[1][1][0], pricePCMember[1][1][1], pricePCMember[1][1][2], pricePCMember[1][1][3], pricePCMember[1][1][4], pricePCMember[1][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[1][2][0], pricePCMember[1][2][1], pricePCMember[1][2][2], pricePCMember[1][2][3], pricePCMember[1][2][4], pricePCMember[1][2][5]);
    lineBot2();
}
// arya
void priceNightMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m               Night Session For Member         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[2][0][0], pricePCMember[2][0][1], pricePCMember[2][0][2], pricePCMember[2][0][3], pricePCMember[2][0][4], pricePCMember[2][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[2][1][0], pricePCMember[2][1][1], pricePCMember[2][1][2], pricePCMember[2][1][3], pricePCMember[2][1][4], pricePCMember[2][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCMember[2][2][0], pricePCMember[2][2][1], pricePCMember[2][2][2], pricePCMember[2][2][3], pricePCMember[2][2][4], pricePCMember[2][2][5]);
    lineBot2();
}
void priceMorningNonMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                Morning Session For Non Member              \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[0][0][0], pricePCNonMember[0][0][1], pricePCNonMember[0][0][2], pricePCNonMember[0][0][3], pricePCNonMember[0][0][4], pricePCNonMember[0][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[0][1][0], pricePCNonMember[0][1][1], pricePCNonMember[0][1][2], pricePCNonMember[0][1][3], pricePCNonMember[0][1][4], pricePCNonMember[0][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[0][2][0], pricePCNonMember[0][2][1], pricePCNonMember[0][2][2], pricePCNonMember[0][2][3], pricePCNonMember[0][2][4], pricePCNonMember[0][2][5]);
    lineBot2();
}
// arya
void priceAfternoonNonMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                Afternoon Session For Non Member         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[1][0][0], pricePCNonMember[1][0][1], pricePCNonMember[1][0][2], pricePCNonMember[1][0][3], pricePCNonMember[1][0][4], pricePCNonMember[1][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[1][1][0], pricePCNonMember[1][1][1], pricePCNonMember[1][1][2], pricePCNonMember[1][1][3], pricePCNonMember[1][1][4], pricePCNonMember[1][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[1][2][0], pricePCNonMember[1][2][1], pricePCNonMember[1][2][2], pricePCNonMember[1][2][3], pricePCNonMember[1][2][4], pricePCNonMember[1][2][5]);
    lineBot2();
}
// arya
void priceNightNonMember()
{
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m               Night Session For Non Member         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop2();
    printf("\t\t\e[32m\xBA\e[0m Room        \e[32m\xBA\e[0m 1 hour\t\t\e[32m\xBA\e[0m 2 hour\t\e[32m\xBA\e[0m 3 hour\t\e[32m\xBA\e[0m 4 hour\t\e[32m\xBA\e[0m 5 hour\t\e[32m\xBA\e[0m 6 hour\t\e[32m\xBA\e[0m\n");
    lineConnector2();
    printf("\t\t\e[32m\xBA\e[0m Executive   \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[2][0][0], pricePCNonMember[2][0][1], pricePCNonMember[2][0][2], pricePCNonMember[2][0][3], pricePCNonMember[2][0][4], pricePCNonMember[2][0][5]);
    printf("\t\t\e[32m\xBA\e[0m VIP         \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[2][1][0], pricePCNonMember[2][1][1], pricePCNonMember[2][1][2], pricePCNonMember[2][1][3], pricePCNonMember[2][1][4], pricePCNonMember[2][1][5]);
    printf("\t\t\e[32m\xBA\e[0m Reguler     \e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m Rp%.2f\t\e[32m\xBA\e[0m\n", pricePCNonMember[2][2][0], pricePCNonMember[2][2][1], pricePCNonMember[2][2][2], pricePCNonMember[2][2][3], pricePCNonMember[2][2][4], pricePCNonMember[2][2][5]);
    lineBot2();
}
// gusadit
int pickRoom(int kode)
{
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                      PICK YOUR ROOM                     \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m ROOM EXECUTIVE                                          \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m ROOM VIP                                                \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 3.  \xBA\e[0m ROOM REGULER                                            \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    kode = validasi3();
    lineBot();
    return kode;
}
// tri
int pickHour(int code)
{
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                    PICK YOUR HOUR(S)                    \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m HOW LONG DO YOU WANT TO PLAY ?                          \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m 1 HOUR                                                  \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m 2 HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 3.  \xBA\e[0m 3 HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 4.  \xBA\e[0m 4 HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 5.  \xBA\e[0m 5 HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 6.  \xBA\e[0m 6 HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 7.  \xBA\e[0m FREE HOURS                                                 \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    code = validasi7();
    int randNumber;
    if(code == 7){
        srand(time(NULL));
        randNumber = rand() % 6 + 1;
        return randNumber;
    }
    lineBot();
    pause();
    return code;
}
// arya
void creatingBill(){
    int i;
    for (i = 0; i < 35000; i++)
    {
        if (i % 100 == 0)
        {
            system("cls");
            printf("\t\t\t\t\e[32m\xBA>>>>>  CREATING BILL -->   \xBA\e[0m");
            for (int j = 0; j < i / 1000; j++)
            {
                printf("%c", 219);
            }
            printf("\e[32m\xBA<<<<<\xBA\e[0m");
        }                
    }
}
// arya
void totalOfCost(char room[], float price, int codeHour, float priceOfFood)
{
    // creatingBill();

    float total = price + priceOfFood;
    pause();
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                      TOTAL OF COST                      \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Name :                      \e[32m\xBA\e[0m %-10s                \e[32m\xBA<<<<<\xBA\e[0m\n", user.name);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Age :                       \e[32m\xBA\e[0m %-2d                        \e[32m\xBA<<<<<\xBA\e[0m\n", user.ages);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m No Hp :                     \e[32m\xBA\e[0m %-15s           \e[32m\xBA<<<<<\xBA\e[0m\n", user.nohp);
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Room :                      \e[32m\xBA\e[0m %-10s                \e[32m\xBA<<<<<\xBA\e[0m\n", room);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Hour :                      \e[32m\xBA\e[0m %-1d                         \e[32m\xBA<<<<<\xBA\e[0m\n", codeHour);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Price :                     \e[32m\xBA\e[0m Rp %-10.2f             \e[32m\xBA<<<<<\xBA\e[0m\n", price);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Food & Drink :              \e[32m\xBA\e[0m Rp %-10.2f             \e[32m\xBA<<<<<\xBA\e[0m\n", priceOfFood);
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Total Price :               \e[32m\xBA\e[0m Rp %-10.2f             \e[32m\xBA<<<<<\xBA\e[0m\n", total);
    lineBot();
    pause();
}
// tri
void listOfSnackAndDrink()
{
    struct priceFoodnDrink list;
    strcpy(list.name[0], "Tea (Ice/Hot)");
    list.pricing[0] = 3000;
    strcpy(list.name[1], "Coffee (Ice/Hot)");
    list.pricing[1] = 4000;
    strcpy(list.name[2], "Milk (Ice/Hot)");
    list.pricing[2] = 5000;
    strcpy(list.name[3], "Fried Noodle");
    list.pricing[3] = 10000;
    strcpy(list.name[4], "Noodle Soup");
    list.pricing[4] = 10000;
    strcpy(list.name[5], "Toast");
    list.pricing[5] = 12000;
    strcpy(list.name[6], "Lays");
    list.pricing[6] = 3000;
    strcpy(list.name[7], "Chitato");
    list.pricing[7] = 3000;
    strcpy(list.name[8], "Milky Joss");
    list.pricing[8] = 6000;
    strcpy(list.name[9], "Candy");
    list.pricing[9] = 1000;
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                    LIST OF SNACK & DRINK                \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m         ITEMS         \e[32m\xBA\e[0m               PRICE             \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m Tea (Ice/Hot)         \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[0]);
    printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m Coffee (Ice/Hot)      \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[1]);
    printf("\t\t\t\t\e[32m\xBA 3.  \xBA\e[0m Milk (Ice/Hot)        \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[2]);
    printf("\t\t\t\t\e[32m\xBA 4.  \xBA\e[0m Fried Noodle          \e[32m\xBA\e[0m Rp %.1f                      \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[3]);
    printf("\t\t\t\t\e[32m\xBA 5.  \xBA\e[0m Noodle Soup           \e[32m\xBA\e[0m Rp %.1f                      \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[4]);
    printf("\t\t\t\t\e[32m\xBA 6.  \xBA\e[0m Toast                 \e[32m\xBA\e[0m Rp %.1f                      \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[5]);
    printf("\t\t\t\t\e[32m\xBA 7.  \xBA\e[0m Lays                  \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[6]);
    printf("\t\t\t\t\e[32m\xBA 8.  \xBA\e[0m Chitato               \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[7]);
    printf("\t\t\t\t\e[32m\xBA 9.  \xBA\e[0m Milky Joss            \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[8]);
    printf("\t\t\t\t\e[32m\xBA 10. \xBA\e[0m Candy                 \e[32m\xBA\e[0m Rp %.1f                       \e[32m\xBA<<<<<\xBA\e[0m\n", priceFoodnDrink[9]);
    lineBot();
}
// tri
float buySnackAndDrink()
{
    float sum = 0;
    int point = 1;
    int temp = 0;
    int i = 0;
    int check = 0;
    listOfSnackAndDrink();
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    while (point) 
    {
        temp = validasi10();
        lineBot();
        int code = temp -1;
        sum += priceFoodnDrink[code];
        switch (temp)
        {
            case 1:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 2:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 3:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 4:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 5:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 6:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 7:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 8:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 9:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            case 10:
                strcpy(item.name[i], list.name[code]);
                item.price[i] = list.pricing[code];
                break;
            default:
                break;
        }
        item.n[code]++;
        temp = 0;
        lineTop();
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Do you want something else?                             \e[32m\xBA<<<<<\xBA\e[0m\n");
        printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m Yes                                                     \e[32m\xBA<<<<<\xBA\e[0m\n");
        printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m No                                                      \e[32m\xBA<<<<<\xBA\e[0m\n");
        lineBot();
        lineTop();
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
        check = validasi2();
        lineBot();
        if (check == 1)
        {
            listOfSnackAndDrink();
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
        }
        else if (check == 2)
        {
            lineTop();
            printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                            OKAY !                       \e[32m\xBA<<<<<\xBA\e[0m\n");
            lineBot();
            point = 0;
        }
    }
    return sum;
    pause();
}
// tri
float snacknDrink()
{
    float priceFoodnDrink;
    system("cls");
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                       SNACK & DRINK                     \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m                                                         \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineConnector();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Do you want to buy some snack or drink ?                \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 1.  \xBA\e[0m Yes                                                     \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA 2.  \xBA\e[0m No                                                      \e[32m\xBA<<<<<\xBA\e[0m\n");
    lineBot();
    lineTop();
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Your Choice : ");
    int code = validasi2();
    lineBot();
    switch (code)
    {
    case 1:
        priceFoodnDrink = buySnackAndDrink();
        break;
    case 2:
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m Wokay Thank You                                    \e[32m\xBA<<<<<\xBA\e[0m\n");
        break;
    default:
        break;
    }
    return priceFoodnDrink;
}
// tri 
void pickSession(int codeSession, int codeRoom, int codeHour, int codeMember)
{   
    time_t t;
    t = time(NULL);
    struct tm tm = *localtime(&t);
    int hour = tm.tm_hour;
    if(hour >= 6 && hour <= 12){
        codeSession = 1;
    }else if(hour > 12 && hour <= 17){
        codeSession = 2;
    }else if(hour > 17 && hour <= 23 || hour >= 0 && hour < 6){
        codeSession = 3;
    }
    float priceOfFood = 0;
    char session[10] = "";
    char room[10] = "";
    codeRoom = pickRoom(codeRoom);
    switch (codeRoom)
    {
    case 1:
        strcpy(room, "Executive");
        break;
    case 2:
        strcpy(room, "VIP");
        break;
    case 3:
        strcpy(room, "Regular");
        break;
    default:
        break;
    }
    codeHour = pickHour(codeHour);

    int i = codeSession - 1;
    int j = codeRoom - 1;
    int k = codeHour - 1;
    if(codeMember == 1){
        price = pricePCMember[i][j][k];
    }else{
        price = pricePCNonMember[i][j][k];
    }
    priceOfFood = snacknDrink();
    int p;
    for (p = 0; p < 35000; p++)
    {
        if (p % 100 == 0)
        {
            system("cls");
            printf("\t\t\t\t\e[32m\xBA>>>>>  TIME IS TICKING AWAY -->   \xBA\e[0m");
            for (int j = 0; j < p / 1000; j++)
            {
                printf("%c", 219);
            }
            printf("\e[32m\xBA<<<<<\xBA\e[0m");
        }                
    }
    pause();
    printf("\t\t\t\t\e[32m\xBA>>>>>  YOU SPENT THE %d hour/s  \xBA\e[0m", codeHour);
    printf("\e[32m\xBA<<<<<\xBA\e[0m");
    pause();
    totalOfCost(room, price, codeHour, priceOfFood);
}
int main()
{
    int codeSession, codeRoom, codeHour, codeMember;
    intro();
    codeMember = memberOrNot();
    pickSession(codeSession, codeRoom, codeHour, codeMember);
    repeat();
}