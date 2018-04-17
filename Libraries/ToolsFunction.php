<?php
/**
 * Created by PhpStorm.
 * User: chenxinghua
 * Date: 2018/4/17
 * Time: 8:23
 */
namespace Libraries;
class ToolsFunction {

    /**
     * Write File
     *
     * Writes data to the file specified in the path.
     * Creates a new file if non-existent.
     *
     * @param	string	$path	File path
     * @param	string	$data	Data to write
     * @param	string	$mode	fopen() mode (default: 'wb')
     * @return	bool
     *
     * 'r'	只读方式打开，将文件指针指向文件头。
     * 'r+'	读写方式打开，将文件指针指向文件头。
     * 'w'	写入方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。
     * 'w+'	读写方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。
     * 'a'	写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
     * 'a+'	读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
     * 'x'	创建并以写入方式打开，将文件指针指向文件头。如果文件已存在，则 fopen() 调用失败并返回 FALSE，并生成一条 E_WARNING 级别的错误信息。如果文件不存在则尝试创建之。这和给 底层的 open(2) 系统调用指定 O_EXCL|O_CREAT 标记是等价的。
     * 'x+'	创建并以读写方式打开，其他的行为和 'x' 一样。
     *
     * Windows 下提供了一个文本转换标记（'t'）可以透明地将 \n 转换为 \r\n。与此对应还可以使用 'b' 来强制使用二进制模式，这样就不会转换数据。要使用这些标记，要么用 'b' 或者用 't' 作为 mode 参数的最后一个字符。
     * 默认的转换模式依赖于 SAPI 和所使用的 PHP 版本，因此为了便于移植鼓励总是指定恰当的标记。如果是操作纯文本文件并在脚本中使用了 \n 作为行结束符，但还要期望这些文件可以被其它应用程序例如 Notepad 读取，则在 mode 中使用 't'。在所有其它情况下使用 'b'。
     * 在操作二进制文件时如果没有指定 'b' 标记，可能会碰到一些奇怪的问题，包括坏掉的图片文件以及关于 \r\n 字符的奇怪问题。
     * 为移植性考虑，强烈建议在用 fopen() 打开文件时总是使用 'b' 标记。
     *
     */
    public static function write_file($data,$path = '',  $mode = 'ab')
    {
        if(!$path) {
            $path = Date('Ymd').'.log';
        }
        $data = $data.PHP_EOL;

        if ( ! $fp = @fopen($path, $mode))
        {
            return FALSE;
        }

        flock($fp, LOCK_EX);

        for ($result = $written = 0, $length = strlen($data); $written < $length; $written += $result)
        {
            if (($result = fwrite($fp, substr($data, $written))) === FALSE)
            {
                break;
            }
        }

        flock($fp, LOCK_UN);
        fclose($fp);

        return is_int($result);
    }
}