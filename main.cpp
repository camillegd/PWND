/* 
SNAKE GAME IN C++
Tutorial from NVitanovic (https://www.youtube.com/watch?v=PSoLD9mVXTA)
Made on the 8th of July 2023
By Camille G
*/

#include <iostream>
#include <windows.h> // fonction Sleep
#include <conio.h>
#include <ctime>
using namespace std;

bool gameOver;
const int width = 20;
const int height = 20;
int x, y, fruitX, fruitY, score;
int tailX[100], tailY[100];
int nTail; // taille de la queue
enum eDirection
{
    STOP = 0,
    RIGHT,
    LEFT,
    UP,
    DOWN
};
eDirection dir;

void setup()
{
    gameOver = false;
    dir = STOP;
    x = width / 2;
    y = height / 2;
    std::srand(std::time(nullptr));
    fruitX = rand() % width;
    fruitY = rand() % height;
    score = 0;
}

void draw()
{
    system("cls");
    for (int i = 0; i < width + 2; i++)
        cout << "#";
    cout << endl;

    for (int i = 0; i < height; i++)
    {
        for (int j = 0; j < height; j++)
        {
            if (j == 0)
                cout << "#";
            if (i == y && j == x)
                cout << "O";
            else if (i == fruitY && j == fruitX)
                cout << "F";
            else
            {
                bool print = false;
                for (int k = 0; k < nTail; k++)
                {
                    if (tailX[k] == j && tailY[k] == i)
                    {
                        cout << "o";
                        print = true;
                    }
                }
                if (!print)
                    cout << " ";
            }
            if (j == width - 1)
                cout << "#";
        }
        cout << endl;
    }

    for (int i = 0; i < width + 2; i++)
        cout << "#";
    cout << endl;
    cout << "Score : " << score << endl;
}

void input()
{
    if (_kbhit())
    { // si une touche du clavier est appuyé, return 1, sinon 0
        switch (_getch())
        {
        case 'd':
            dir = LEFT;
            break;
        case 'f':
            dir = RIGHT;
            break;
        case 'r':
            dir = UP;
            break;
        case 'c':
            dir = DOWN;
            break;
        case 'x':
            gameOver = true;
            break;
        default:
            dir = STOP;
            break;
        }
    }
}

void logic()
{
    int prevX = tailX[0];
    int prevY = tailY[0];
    int prev2X, prev2Y;
    tailX[0] = x;
    tailY[0] = y;
    for (int i = 1; i < nTail; i++)
    {
        prev2X = tailX[i];
        prev2Y = tailY[i];
        tailX[i] = prevX;
        tailY[i] = prevY;
        prevX = prev2X;
        prevY = prev2Y;
    }
    switch (dir)
    {
    case LEFT:
        x--;
        break;
    case RIGHT:
        x++;
        break;
    case UP:
        y--;
        break;
    case DOWN:
        y++;
        break;
    default:
        break;
    }
    if (x > width || x < 0 || y > height || y < 0)
    { // terminer le jeu quand touche mur
        gameOver = true;
    }
    /*
    // passage du serpent du mur gauche au mur droit et inversement
    if(x >= width)
        x=0;
    else if (x < width)
        x = width - 1;
    if(y >= height)
        y=0;
    else if (y < height)
        y = height - 1;
    */
    for (int i=0;i<nTail;i++){ // si on va sur soi-même = game over
        if(tailX[i] == x && tailY[i] == y){
            gameOver = true;
        }
    }
    if (x == fruitX && y == fruitY)
    {
        score += 10;
        std::srand(std::time(nullptr));
        fruitX = rand() % width;
        fruitY = rand() % height;
        nTail++;
    }
}

int main()
{
    setup();
    while (!gameOver)
    {
        draw();
        input();
        logic();
        Sleep(200);
    }
    return 0;
}
